<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\Models\Manager::class, function (Faker $faker) {
    return [
        'type_transacction' => rand(0,5),
        'mainjisa' => Str::random(10),
        'namejisa' => $faker->name(),
        'agencyjisa' => Str::random(10),
        'nameagency' => $faker->name(),
        'companyjisa' => $faker->randomNumber(),
        'namecompany' => $faker->name(),
        'type_account' => $faker->randomElement(['100202034558','100202034548']),
        'code_driver' => $faker->numberBetween($min = 1000, $max = 9000),
        'name_driver' => $faker->name(),
        'withdraw' => $faker->numerify('##########'),
        'recharge' => $faker->numerify('##########'),
        'notes' => $faker->sentence(),
        'content' => $faker->sentence(),


    ];
});
