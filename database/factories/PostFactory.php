<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'body' => $faker->text(1500),
        'user_id' => 1,
    ];
});
