<?php

use Faker\Generator as Faker;

$factory->define(\App\Actor::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
    ];
});
