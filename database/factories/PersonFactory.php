<?php

use Faker\Generator as Faker;

$factory->define(\App\Person::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'date' => '17/09/08'
    ];
});
