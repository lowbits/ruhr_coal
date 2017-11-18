<?php

use App\Tour;
use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Tour::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(),
        'duration' => random_int(10, 300),
        'user_id' => User::inRandomOrder()->limit(1)->get()->first()->id
    ];
});