<?php

namespace Database\Factories\Geoevent;

use App\Models\Geoevent\Event;
use App\Models\Geoevent\Subscription;
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
