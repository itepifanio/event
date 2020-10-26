<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'event_id' => Event::factory()->create()->id,
            'percentage' => $this->faker->numberBetween(0, 100),
        ];
    }

    public function ofEvent(int $id)
    {
        return $this->state(fn() => ['event_id' => $id]);
    }

    public function ofUser(int $id)
    {
        return $this->state(fn() => ['user_id' => $id]);
    }
}
