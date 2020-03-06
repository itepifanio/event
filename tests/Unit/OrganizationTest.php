<?php

namespace Tests\Unit;

use App\Organization;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp(); // I forgot this one
        $this->user = factory(\App\User::class)->create();
        $this->organization = factory(Organization::class)->create();
        $this->organization->users()->attach($this->user->id);
    }

    public function test_organization_has_users()
    {
        $this->assertTrue($this->organization->users->first()->id == $this->user->id);
    }
}
