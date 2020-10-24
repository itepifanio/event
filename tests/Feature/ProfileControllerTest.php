<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'password' => Hash::make('birl')
        ]);
    }

    /** @test */
    public function it_can_update_a_user_profile()
    {
        $form = [
            'name' => 'Ms potata',
            'password' => 'teste123',
            'password_confirmation' => 'teste123',
            'old-password' => 'birl',
        ];

        $this->actingAs($this->user);

        $this->put(
            route('profile.update', $this->user),
            array_merge(
                $this->user->getRawOriginal(),
                $form,
            )
        )->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => $form['name'],
        ]);
    }
}
