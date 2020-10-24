<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    private Organization $organization;

    public function setUp(): void
    {
        parent::setUp();
        $this->organization = Organization::factory()->create();
    }

    /** @test */
    public function it_can_store_a_event()
    {
        $this->actingAs($this->organization->owner);

        $form = [
            'name' => 'Cool event name',
            'description' => 'Cool kids, cheap drinks',
            'start_date' => '2020-10-09 20:00:00',
            'end_date' => '2020-10-10 05:30:00',
            'address_name' => 'My home',
            'lat' => -44,
            'lng' => 88,
        ];

        $this->post(route('organizations.event.store', $this->organization->id), $form)
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('events', Arr::except($form, ['lat', 'lng', 'address_name']));
        $this->assertDatabaseHas('addresses', [
            'lat' => $form['lat'],
            'lng' => $form['lng'],
            'name' => $form['address_name'],
        ]);
    }

    /** @test */
    public function it_can_update_a_event()
    {
        $this->actingAs($this->organization->owner);

        $form = [
            'name' => 'Cool event name',
            'description' => 'Cool kids, cheap drinks',
            'start_date' => '2020-10-09 20:00:00',
            'end_date' => '2020-10-10 05:30:00',
            'address_name' => 'My home',
            'lat' => -44,
            'lng' => 88,
        ];

        $this->post(route('organizations.event.store', $this->organization->id), $form)
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('events', Arr::except($form, ['lat', 'lng', 'address_name']));
        $this->assertDatabaseHas('addresses', [
            'lat' => $form['lat'],
            'lng' => $form['lng'],
            'name' => $form['address_name'],
        ]);
    }
}
