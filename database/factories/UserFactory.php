<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'student_number' => $faker->unique()->uuid,
        'password' => bcrypt('secret'), // secret
        'role' => $faker->randomElement($array = array('admin', 'student')),
        'remember_token' => str_random(10),
    ];
});
