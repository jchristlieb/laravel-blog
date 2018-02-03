<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(rand(1, 4), true),
        'post_id' => $faker->numberBetween(1, 20),
        'website' => $faker->url,
    ];
});
