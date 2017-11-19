<?php

use App\Location;
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

$factory->define(Location::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'description' => $faker->sentence(),
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'type' => $faker->word,
        'indoor' => random_int(0, 1),
        'outdoor' => random_int(0, 1),
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'adress' => $faker->address,
        'url' => $faker->url,
        'telephone' => $faker->phoneNumber,
        'photo_url' => 'http://placehold.it/1000x1000'
    ];
});
