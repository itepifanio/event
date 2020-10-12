<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateOrganizationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_organization_and_user_is_associated_as_a_owner()
    {
        $form = [
            'name' => 'Mr Potato',
            'organization_name' => 'Mr Potato CO',
            'email' => 'mrpotato@gmail.com',
            'password' => $password = 'frenchfries',
            'description' => 'Cool company',
            'foundation_date' => now(),
            'is_organization' => 'true',
            'password_confirmation' => $password,
        ];

        $response = $this->post(url('register'), $form);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
           'email' => 'mrpotato@gmail.com',
        ]);

        $user = User::where('email', 'mrpotato@gmail.com')->first();

        $this->assertDatabaseHas('user_organizations', [
            'user_id' => $user->id,
            'role' => User::ROLES_OWNER,
        ]);
    }
}
