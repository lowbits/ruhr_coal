<?php

use App\Activity;
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

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);
    }
}
