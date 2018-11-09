<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Branches, Products_status, Product_types, Products};

$factory->define(Products::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $branchId = Branches::all()->random()->id;
    $productStatusId = Products_status::all()->random()->id;
    $productTypeId = Product_types::all()->random()->id;
    $name = $faker->unique()->word;
    $active = (int)$faker->boolean;
    
    return [
        'identity'=>$identity,
        'branch_id'=>$branchId,
        'product_status_id'=>$productStatusId,
        'product_type_id'=>$productTypeId,
        'name'=>$name,
        'active'=>$active,
    ];
});

$factory->state(Products::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});