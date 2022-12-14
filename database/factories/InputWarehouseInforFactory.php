<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
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

$factory->define(\App\Models\InputWarehouseInfo::class, function (Faker $faker) {
    return [
        'product_id' => \App\Models\Product::all()->random()->id,

        'input_id' => \App\Models\InputWarehouse::all()->random()->id,
        'count' => $faker->randomNumber(2),
        'input_price' => $faker->randomNumber(),
        'output_price' => $faker->randomNumber(),


    ];
});
