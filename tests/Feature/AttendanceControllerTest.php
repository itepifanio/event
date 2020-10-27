<?php

namespace Tests\Feature;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceControllerTest extends TestCase
{
    use RefreshDatabase;

    private Attendance $attendance;
    private User $user;
    private Organization $organization;
    private Event $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->event = Event::factory()->create();
        $this->organization = $this->event->organization;
        $this->user = User::factory()->role(User::ROLES_COMMON)->create();
    }

    /** @test */
    public function user_can_see_his_frequency()
    {
        $this->actingAs($this->organization->owner);

        $this->get(
            route(
                'organizations.events.attendances.index',
                [$this->event->organization->id, $this->event->id]
            )
        )->assertStatus(200);
    }

    /** @test */
    public function it_can_redirect_to_attendance_edit()
    {
        $this->actingAs($this->organization->owner);

        $this->get(
            route(
                'organizations.events.attendances.edit',
                [$this->event->organization->id, $this->event->id]
            )
        )->assertStatus(200);
    }

    /** @test */
    public function it_cant_store_negative_percentage()
    {
        $this->actingAs($this->organization->owner);

        $form = [
            [
                'user_id' => $this->user->id,
                'percentage' => -20,
            ]
        ];

        $this->put(
            route(
                'organizations.events.attendances.update',
                [$this->event->organization->id, $this->event->id]
            ),
            $form
        )->assertSessionHasErrors('0.percentage');
    }

    /** @test */
    public function it_cant_store_percentage_above_one_hundred()
    {
        $this->actingAs($this->organization->owner);

        $form = [
            [
                'user_id' => $this->user->id,
                'percentage' => 101,
            ],
        ];

        $this->put(
            route(
                'organizations.events.attendances.update',
                [$this->event->organization->id, $this->event->id]
            ),
            $form
        )->assertSessionHasErrors('0.percentage');
    }

    /** @test */
    public function it_can_store_attendance()
    {
        $this->actingAs($this->organization->owner);

        $form = [
            [
                'user_id' => $this->user->id,
                'percentage' => 60,
            ]
        ];

        $this->put(
            route(
                'organizations.events.attendances.update',
                [$this->event->organization->id, $this->event->id]
            ),
            $form
        )->assertSessionHasNoErrors();

        $this->assertDatabaseHas('attendances', [
            'event_id' => $this->event->id,
            'user_id' => $form[0]['user_id'],
            'percentage' => $form[0]['percentage']
        ]);
    }

    public function it_validates_if_the_user_is_subscribed_on_the_event()
    {
        //TODO::waiting for subscription tests, factories and stuff
    }

    public function it_validates_if_the_event_belongs_to_organization()
    {
        //TODO::creates custom exception
    }
}
