<?php

namespace Tests\Feature;

use App\Models\Geoevent\Event;
use App\Models\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    private Organization $organization;
    private Event $event;

    public function setUp(): void
    {
        parent::setUp();
        $this->organization = Organization::factory()->create();
        $this->event = Event::factory()
            ->ofOrganization($this->organization->id)
            ->withAddress()
            ->create();
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

        $this->post(route('organizations.events.store', $this->organization->id), $form)
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

        $this->put(route('organizations.events.update', [$this->organization->id, $this->event->id]), $form)
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('events', array_merge(
            Arr::except($form, ['address_name', 'lat', 'lng']),
            ['id' => $this->event->id],
        ));
        $this->assertDatabaseHas('addresses', [
            'lat' => $form['lat'],
            'lng' => $form['lng'],
            'name' => $form['address_name'],
        ]);
    }

    /** @test */
    public function it_can_show_event()
    {
        $this->actingAs($this->organization->owner);

        $this->get(route('organizations.events.index', [$this->organization->id, $this->event->id]))
            ->assertSessionHasNoErrors();
    }

    /** @test */
    public function it_throws_exception_on_update_if_the_event_doesnt_belongs_to_organization()
    {
        $this->actingAs($this->organization->owner);
        $event = Event::factory()->create();
        $form = [
            'name' => 'Cool event name',
            'description' => 'Cool kids, cheap drinks',
            'start_date' => '2020-10-09 20:00:00',
            'end_date' => '2020-10-10 05:30:00',
            'address_name' => 'My home',
            'lat' => -44,
            'lng' => 88,
        ];

        $this->put(
            route('organizations.events.update', [$this->organization->id, $event->id]),
            $form
        )->assertSessionHas(['error' => 'Event doesn\'t belong organization']);
    }

    /** @test */
    public function it_throws_exception_on_delete_if_the_event_doesnt_belongs_to_organization()
    {
        $this->actingAs($this->organization->owner);
        $event = Event::factory()->create();

        $this->delete(
            route('organizations.events.destroy', [$this->organization->id, $event->id]),
        )->assertSessionHas(['error' => 'Event doesn\'t belong organization']);
    }
}
