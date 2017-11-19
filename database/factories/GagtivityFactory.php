<?php

use App\Gactivity;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Gactivity::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(),
        'user_id' => factory('App\User')->create()->id,
        'price' => mt_rand() / mt_getrandmax() * random_int(10, 50),
        'location_id' => factory('App\Location')->create()->id,
        'min_person_count' => $pcount = random_int(1, 10),
        'max_person_count' => $pcount + random_int(1, 20),
        'is_public' => random_int(0, 1),
        'rhythm' => collect(['wöchentlich', 'einmalig', 'zweiwöchentlich'])->random(),
        'date' => Carbon::now()->addDay(10),
        'category' => $faker->word,
        'weather' => collect([
            'bei trockenem Wetter', 'bei jedem Wetter', 'ab 42°C mit Sandalen und Socken'
        ])->random(),
    ];
});
