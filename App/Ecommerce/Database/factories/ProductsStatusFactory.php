<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\Products_status;

$factory->define(Products_status::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    
    return [
        'name'=>$name,
    ];
});