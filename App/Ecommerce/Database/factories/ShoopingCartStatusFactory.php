<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\Shooping_cart_status;

$factory->define(Shooping_cart_status::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    
    return [
        'name'=>$name,
    ];
});