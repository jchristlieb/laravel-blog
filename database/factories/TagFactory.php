<?php

use Faker\Generator as Faker;

$factory->define(\App\Tag::class, function (Faker $faker) {
    $tagName = $faker->unique()->word;

    return [
        'name' => $tagName,
        'slug' => str_slug($tagName),
    ];
});
