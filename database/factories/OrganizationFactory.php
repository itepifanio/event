<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Organization;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
