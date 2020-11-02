<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Subscription;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function role(string $role, int $organizationId = -1)
    {
        if (!in_array($role, User::ROLES)) {
            throw new Exception('Invalid role');
        }

        return $this->afterCreating(function (User $user) use ($role, $organizationId) {
            if ($organizationId != -1) {
                $user->organizations()->sync([
                    $organizationId => [
                        'role'   => $role,
                        'status' => User::STATUS_ACTIVE,
                    ]
                ]);
                return $user;
            } else if ($user->organizations != null) {
                $organization = Organization::factory()->create();
            } else {
                $organization = $user->organizations()->first();
            }

            return $user->organizations()->sync([
                $organization->id => [
                    'role'   => $role,
                    'status' => User::STATUS_ACTIVE,
                ]
            ]);
        });
    }

    public function subscribedTo(int $eventId)
    {
        return $this->afterCreating(function (User $user) use ($eventId) {
            Subscription::factory()->create([
                'user_id' => $user->id,
                'event_id' => $eventId,
            ]);

            return $user;
        });
    }
}
