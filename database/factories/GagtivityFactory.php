<?php

use App\Gactivity;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Gactivity::class, function (Faker $faker) {

    $titles = collect([
        'Rundgang über das Gelände von Schacht X',
        'Tour über das Gelände die Villa Hügel',
        'Geschichte der Gartenstadt Welheim',
        'Kokereien früher und heute',
        'Der Landschaftspark Nord im Laufe der Zeit',
        'Stadtteilführung durch die Dortmunder Nordstadt',
        'Begehung des Tetraeders mit Blick auf die Kokerei Prosper',
        'Wanderung auf dem Kreuzweg der Halde Haniel'
    ]);

    return [
        'title' => $titles->random(),
        'description' => $faker->sentence(),
        'user_id' => factory('App\User')->create()->id,
        'price' => random_int(2, 50),
        'location_id' => factory('App\Location')->create()->id,
        'min_person_count' => $pcount = random_int(1, 10),
        'max_person_count' => $pcount + random_int(1, 20),
        'is_public' => random_int(0, 1),
        'rhythm' => collect(['wöchentlich', 'einmalig', 'zweiwöchentlich'])->random(),
        'date' => Carbon::now()->addDay(10),
        'category' => 'Führung',
        'weather' => collect([
            'bei trockenem Wetter', 'bei jedem Wetter', 'ab 42°C mit Sandalen und Socken'
        ])->random(),
    ];
});
