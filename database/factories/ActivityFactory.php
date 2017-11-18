<?php

use App\Activity;
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

$factory->define(Activity::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(),
        'weather' => collect(['bei trockenem Wetter', 'bei jedem Wetter', 'ab 42°C mit Sandalen und Socken'])->random(),
        'user_id' => factory('App\User')->create()->id,
        'opening_hours' => 'von 10:00 Uhr – 19:00 Uhr',
        'price' => mt_rand() / mt_getrandmax() * random_int(10, 50),
        'student_discount' => random_int(0,1),
        'location_id' => factory('App\Location')->create()->id,
        'person_count' => random_int(1, 10),
        'is_public' => random_int(0, 1),
        'category' => $faker->word
    ];
});