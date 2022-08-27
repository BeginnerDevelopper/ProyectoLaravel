<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        
        "name" => $faker->words(3,true),
        "sell_price" => $faker->randomNumber(),
        "stock" => $faker->randomNumber()

    ];
});
