<?php

use Faker\Generator as Faker;

$factory->define(\App\Film::class, function (Faker $faker) {
    return [
        'title'             => $faker->firstName,
        'original_title'    => $faker->lastName,
        'slogan'            => $faker->jobTitle,
        'budget'            => rand(100000, 10000000),
        'date'              => '17/09/08',
        'age'               => rand(16, 18),
        'rating'            => rand(1, 10),
        'time'              => rand(60, 360),
        'sh_description'    => $faker->text('200'),
        'description'       => $faker->text('600'),
        'trailer_field'     => 'https://www.youtube.com/embed/IuLkvgavbK4',
        'video_field'       => 'https://www.youtube.com/embed/IuLkvgavbK4',
        'image'        => ''
//        'slug'              => $faker->unique()
    ];
});
