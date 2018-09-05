<?php

use Faker\Generator as Faker;

$factory->define(\App\Film::class, function (Faker $faker) {
    return [
        'title'             => $faker->firstName,
        'original_title'    => $faker->lastName,
        'slogan'            => $faker->jobTitle,
        'budget'            => rand(100000, 10000000),
        'world_premiere'    => $faker->date(),
        'age'               => rand(16, 18),
        'rating'            => rand(1, 10),
        'time'              => rand(60, 360),
        'poster_img'        => 'http://www.omdbapi.com/src/poster.jpg'
//        'slug'              => $faker->unique()
    ];
});
