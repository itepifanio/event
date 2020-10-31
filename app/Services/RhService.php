<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\MailInvite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class RhService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function update(Organization $organization, User $user, array $data) : void
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $this->userRepository->update($user, Arr::only($data, ['name', 'email']));
        $this->userRepository->attachOrganization($user, $organization, $data['status'] ,$data['role']);
    }
    public function save(Organization $organization, array $lotdata): void
    {
        // ver uma forma melhor de fazer isso 
        $users = $lotdata['users'];
        
        foreach($users as $userid){
            
            $user = User::find($userid);

            
            $data = array_merge(Arr::only($lotdata, ['role']), $user->toArray());
            
            $validator = Validator::make($data, $this->rules());
            
            if($validator->fails()){
                throw ValidationException::withMessages($validator->errors()->toArray());
            }
            
            // $this->userRepository->attachOrganization($user, $organization, 'pending', $data['role']);
           
            Mail::to($user->email)->send(new MailInvite($user, $organization));
            
        }
    }
    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => ['required', 'string', Rule::in(User::ROLES)],
        ];
    }
}
