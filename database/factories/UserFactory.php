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
        'name' => 'Admin',
        'email' => 'ziyodkhusanov@gmail.com',
        'password' => '422c4e998361055fa520d3e46dbb0745', // secret
        'remember_token' => str_random(10),
    ];
});