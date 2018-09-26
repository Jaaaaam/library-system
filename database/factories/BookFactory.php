<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'description' => $faker->sentences($nb = 3, $asText = true),
        'no_of_pages' => $faker->randomNumber($nbDigits = 3, $strict = false),
        'borrowed_by' => NULL
    ];
});
