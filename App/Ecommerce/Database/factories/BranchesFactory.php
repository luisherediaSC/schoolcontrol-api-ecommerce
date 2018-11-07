<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\Branches;

$factory->define(Branches::class, function (Faker $faker) {
    $name = $faker->unique()->company;
    
    return [
        'name'=>$name,        
    ];
});

$factory->state(Branches::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});