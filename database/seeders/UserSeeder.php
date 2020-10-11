<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Owner name',
            'email' => 'event@gmail.com',
            'password' => Hash::make('mudar@123'),
        ]);

        $organization = Organization::factory()->create([
            'name' => 'Event Company',
            'user_id' => $user->id,
        ]);

        $user->organizations()->sync([
            $organization->id => [
                'role' => User::ROLES_OWNER,
            ]
        ]);

        User::factory()->role('admin', $organization->id)->create();
    }
}
