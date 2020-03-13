<?php

namespace Tests\Unit;

use App\Event;
use App\Organization;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->organization = factory(Organization::class)->create();
        $this->event = factory(Event::class)
            ->create(['organization_id' => $this->organization->id]);
    }

    public function test_event_has_organization()
    {
        $this->assertTrue($this->organization->id == $this->event->organization->id);
    }
}
