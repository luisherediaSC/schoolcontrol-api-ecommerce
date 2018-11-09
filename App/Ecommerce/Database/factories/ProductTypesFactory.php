<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\Product_types;

$factory->define(Product_types::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    
    return [
        'name'=>$name,
    ];
});