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
    $cities = collect([
        'Bochum', 'Bottrop', 'Dortmund', 'Duisburg', 'Essen', 'Gelsenkirchen',
        'Recklinghausen', 'Mülheim an der Ruhr', 'Oberhausen'
    ]);

    return [
        'title' => $faker->sentence(4),
        'description' => $faker->sentence(10),
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'type' => $faker->word,
        'indoor' => random_int(0, 1),
        'outdoor' => random_int(0, 1),
        'city' => $cities->random(),
        'zip' => $faker->postcode,
        'adress' => $faker->address,
        'url' => $faker->url,
        'telephone' => $faker->phoneNumber,
        'photo_url' => 'https://picsum.photos/300/300/?random=' . random_int(0,1000),
    ];
});
