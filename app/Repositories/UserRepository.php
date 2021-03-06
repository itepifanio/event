<?php

namespace App\Repositories;

use App\Geoevent\Repositories\UserRepository as GeoUserRepository;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserRepository extends GeoUserRepository
{
    public function save(array $data) : User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(User $user, array $data) : User
    {
        return tap($user)->update(Arr::except($data, 'id'));
    }

    public function attachOrganization(User $user, Organization $organization, string $status, string $role)
    {
        $user->organizations()->sync([
            $organization->id => [
                'role' => $role,
                'status'=> $status
            ]
        ]);
    }
}
