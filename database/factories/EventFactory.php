<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Event::class, function (Faker $faker) {
    return [

        'name' => $faker->word,
        'description' => $faker->text(200),
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'image' => $faker->imageUrl(),

    ];
});
