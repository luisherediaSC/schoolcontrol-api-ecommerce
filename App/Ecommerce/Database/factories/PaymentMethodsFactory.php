<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\Payment_methods;

$factory->define(Payment_methods::class, function (Faker $faker) {
    $name = $faker->word;
    
    return [
        'name'=>$name,
    ];
});

$factory->state(Payment_methods::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});