<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(3),   //each sentance have 3 words
        'description'=> $faker->paragraph(4), //each paragraph have 4 sentench
        'completed'=> false,
    ];
});
