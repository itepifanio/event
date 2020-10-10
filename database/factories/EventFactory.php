<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text(200),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
