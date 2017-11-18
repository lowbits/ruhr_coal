<?php

use App\Activity;
use App\Location;
use App\Tour;
use App\User;
use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Activity::class, 50)->create();

        factory(Tour::class, 10)->create()->each(function($tour) {
            $location_count = random_int(2, 10);

            $locations = Location::inRandomOrder()->limit($location_count)->get();
            $tour->locations()->attach($locations);
        });

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);
    }
}
