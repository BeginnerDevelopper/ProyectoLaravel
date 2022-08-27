<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Purchase;
use Faker\Generator as Faker;

$factory->define(Purchase::class, function (Faker $faker) {
    return [
     
        'purchase_date' => '2022-08-19',
        'tax' => 19,
        'total' => 28000,
        'status' => 'ACTIVE',
        'picture' => 'icono.jpg',
    ];
});
