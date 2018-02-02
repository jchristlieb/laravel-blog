<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->words(rand(2,5), true);
    return [
        'abstract' => $faker->paragraph(rand(2,3), true),
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->paragraphs(rand(2,7), true),
        'user_id' => $faker->numberBetween(1,3)
    ];
});
