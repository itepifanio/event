<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'user_id' => User::factory()->create()->id,
            'description' => Lorem::words(4, true),
            'foundation_date' => $this->faker->dateTimeThisDecade,
        ];
    }
}
