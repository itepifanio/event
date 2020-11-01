<?php

namespace App\Services;

use Exception;
use App\Models\Organization;
use App\Models\User;
use App\Models\Invite;
use App\Mail\MailInvite;
use App\Repositories\UserRepository;
use App\Repositories\InvitationRepository;
use App\Exceptions\InvitationAlreadyConfirmed;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

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

    public function confirmInvitation(Invite $invitation, array $data):void
    {   
        $user_organization = DB::table('user_organizations')->where('id', $invitation->user_organization_id)->first();
        
        if($user_organization->status !== User::STATUS_PENDING){
            throw new InvitationAlreadyConfirmed;
        }

        $organization = Organization::find($user_organization->organization_id);
        
        $user = User::find($user_organization->user_id);

        if(isset($data['password_confirmation'])) {
            
            if(Hash::check($data['password_confirmation'], $user->password)){
                
                if(isset($data['confirmInvitation'])){
                    $user_organization->status = User::STATUS_ACTIVE;
                }else{
                    $user_organization->status = User::STATUS_REFUSED;
                }

                $user_data  =  array_merge((array) $user_organization, ['email'=> $user->email, 'name'=> $user->name]);
                
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
           
            $invitation = $this->invitationRepository->createConfirmationToken(['user_id'=>$user->id, 'organization_id'=>$organization->id]);
            
            Mail::to($user->email)->send(new MailInvite($user, $organization, $invitation)); 
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
