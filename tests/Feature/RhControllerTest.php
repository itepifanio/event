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

    public function it_can_edit_user()
    {

    }
}
