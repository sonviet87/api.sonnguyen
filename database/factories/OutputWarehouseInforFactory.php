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

$factory->define(\App\Models\OutputWarehouseInfo::class, function (Faker $faker) {
    return [
        'product_id' => \App\Models\Product::all()->random()->id,
        'input_info_id' => \App\Models\InputWarehouseInfo::all()->random()->id,
        'output_id' => \App\Models\OutputWarehouse::all()->random()->id,
        'count' => $faker->randomNumber(2),
        'price' => $faker->randomNumber(),
    ];
});
