<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'event_id' => Event::factory()->create()->id,
        ];
    }
}
