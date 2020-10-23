<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\User;

class OrganizationRepository
{
    public function save(?User $user, array $data) : Organization
    {
        return Organization::create([
            'user_id' => $user->id,
            'description' => $data['description'],
            'foundation_date' => $data['foundation_date'],
            'name' => $data['organization_name'],
        ]);
    }

    public function update(Organization $organization, array $data) : Organization
    {
        $organization->update($data);

        return $organization;
    }

    public function delete(Organization $organization) : void
    {
        $organization->delete();
    }
}
