<?php

namespace App\Repositories;


use App\Models\Invite;
use Illuminate\Support\Facades\DB;

class InvitationRepository
{
    public function createConfirmationToken(array $data): Invite
    {   
        $user_organization = DB::table('user_organizations')->where('user_id', $data['user_id'])->where('organization_id', $data['organization_id'])->first();
        $token = md5(time());

        $invitation = new Invite();
        
        $invitation->token = $token;
        $invitation->user_organization_id = $user_organization->id;
        

        $invitation->save();

        return $invitation;
            
    }
}
