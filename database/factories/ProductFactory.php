<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Unit;
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

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'code' => Str::random(10),
        'content' => $faker->text(),
        'user_id' => User::all()->random()->id,
        'unit_id' => Unit::all()->random()->id,
        'suplier_id' => \App\Models\Suplier::all()->random()->id,

    ];
});
