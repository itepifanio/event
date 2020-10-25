<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'name' => $this->faker->address,
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'addressable_id' => Event::factory()->create()->id,
            'addressable_type' => Event::class,
        ];
    }

    public function ofEvent(int $id)
    {
        return $this->state(fn() => ['addressable_id' => $id]);
    }
}
