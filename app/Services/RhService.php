<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\InvitationRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\MailInvite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RhService
{
    private UserRepository $userRepository;
    private InvitationRepository $invitationRepository;
    
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->invitationRepository = new InvitationRepository();
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
    public function confirmInvitation(Organization $organization, User $user, array $data):void{

        if(isset($data['password_confirmation'])) {
            
            if(Hash::check($data['password_confirmation'], $user->password)){

                $user_organizations = DB::table('user_organizations')->where('user_id', $user->id)->where('organization_id', $organization->id)->first();
                
                if(isset($data['confirmInvitation'])){
                    $user_organizations->status = User::STATUS_ACTIVE;
                }else{
                    $user_organizations->status = User::STATUS_REFUSED;
                }

                $user_data  =  array_merge((array) $user_organizations, ['email'=> $user->email, 'name'=> $user->name]);
                
                $this->update($organization, $user, $user_data);
                
            }else {
                $validator = Validator::make($data, ['password_confirmation' => 'required']);

                $validator->after(function ($validator) {
                    $validator->errors()->add('password_confirmation', 'The password does not match');
                });

                throw ValidationException::withMessages($validator->errors()->toArray());
            }
        }
                
    }
    public function save(Organization $organization, array $lotdata): void
    {
        $users = $lotdata['users'];
        
        foreach($users as $userid){
            
            $user = User::find($userid);

            
            $data = array_merge(Arr::only($lotdata, ['role', 'status']), $user->toArray());
            
            
            $validator = Validator::make($data, $this->rules());
            
            if($validator->fails()){
                throw ValidationException::withMessages($validator->errors()->toArray());
            }

            $this->userRepository->attachOrganization($user, $organization, $data['status'], $data['role']);
           
            $confirmation = $this->invitationRepository->createConfirmationToken(['user_id'=>$user->id, 'organization_id'=>$organization->id]);
            
            Mail::to($user->email)->send(new MailInvite($user, $organization, $confirmation->token));
            
        }
    }
    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'status' => 'required|string',
            'role' => ['required', 'string', Rule::in(User::ROLES)],
        ];
    }
}
