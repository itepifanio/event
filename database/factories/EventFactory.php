<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Event;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->text(100),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'organization_id' => Organization::factory()->create()->id,
        ];
    }

    public function ofOrganization(int $id)
    {
        return $this->state(fn() => ['organization_id' => $id]);
    }

    public function withAddress()
    {
        return $this->afterCreating(function (Event $event){
            Address::factory()->ofEvent($event->id)->create();
        });
    }
}
