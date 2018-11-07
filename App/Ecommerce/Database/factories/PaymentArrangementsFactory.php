<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Payment_arrangements, Products};

$factory->define(Payment_arrangements::class, function (Faker $faker) {
    $productId = Products::all()->random()->id;
    $identity = Identities::all()->random()->id;
    $name = $faker->unique()->word;
    $active = (int)$faker->boolean;
    $isPublic = (int)$faker->boolean;
    
    return [
        'product_id'=>$productId,
        'identity'=>$identity,
        'name'=>$name,
        'active'=>$active,
        'is_public'=>$isPublic,
    ];
});

$factory->state(Payment_arrangements::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});