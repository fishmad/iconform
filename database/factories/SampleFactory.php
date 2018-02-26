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

$factory->define(App\Sample::class, function (Faker $faker) {
    static $password;

    return [
        'name'        =>  $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' =>  $faker->paragraph,
        'image'       =>  $faker->imageUrl($width = 640, $height = 480),
        'date'        =>  $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
