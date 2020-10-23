<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrganizationControllerTest extends TestCase
{
    use RefreshDatabase;

    private Organization $organization;

    public function setUp(): void
    {
        parent::setUp();
        $this->organization = Organization::factory()->create();
    }

    /** @test */
    public function it_can_update_a_organization()
    {
        $this->actingAs($this->organization->owner);

        $form = [
            'name' => 'test',
            'description' => 'a good description',
            'email' => 'mycoolorganization@event.com',
        ];

        $this->put(
            route('organizations.update', $this->organization->id),
            array_merge($this->organization->getRawOriginal(), $form)
        )->assertSessionHasNoErrors();

        $this->assertDatabaseHas('organizations', [
            'name' => $form['name'],
            'description' => $form['description'],
            'id' => $this->organization->id,
        ]);
    }

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
