<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RhControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_if_a_user_is_admin_or_owner_on_redirect_to_index()
    {
        $organization = Organization::factory()->create();
        $admin = User::factory()->role('admin', $organization->id)->create();
        $owner = User::factory()->role('owner', $organization->id)->create();
        $common = User::factory()->role('common', $organization->id)->create();

        $this->actingAs($admin);
        $this->get(route('organizations.rh.index', $organization->id))
            ->assertStatus(200);
        $this->actingAs($owner);
        $this->get(route('organizations.rh.index', $organization->id))
            ->assertStatus(200);
        $this->actingAs($common);
        $this->get(route('organizations.rh.index', $organization->id))
            ->assertStatus(302);
    }

    /** @test */
    public function it_can_edit_user()
    {
        $form = [
            'role' => User::ROLES_COMMON,
            'name' => 'Mr Potato',
            'status' => User::STATUS_PENDING,
            'email' => 'random@gmail.com',
        ];

        $user = User::factory()->role('admin')->create();
        $organization = $user->organizations()->first();

        $this->actingAs($user);

        $this->put(route('organizations.rh.update', [$organization->id, $user->id]), $form)
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $form['name'],
            'email' => $form['email'],
        ]);

        $this->assertDatabaseHas('user_organizations', [
            'user_id' => $user->id,
            'role' => $form['role'],
            'status'=> $form['status'],
        ]);
    }
}
