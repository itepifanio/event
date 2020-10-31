<?php

namespace App\Repositories;


use App\Models\Confirmation;
use Illuminate\Support\Facades\DB;

class InvitationRepository
{
    public function createConfirmationToken(array $data): Confirmation
    {   
        $user_organization = DB::table('user_organizations')->where('user_id', $data['user_id'])->where('organization_id', $data['organization_id'])->first();
        $token = md5(time());

        $confirmation = new Confirmation();
        
        $confirmation->token = $token;
        $confirmation->user_organization_id = $user_organization->id;
        

        $confirmation->save();

        return $confirmation;
            
    }
}
