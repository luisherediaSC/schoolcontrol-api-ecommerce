<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\Products;
use App\Ecommerce\Models\{Branches, Products_status, Product_types};

$factory->define(Products::class, function (Faker $faker) {
    $branchId = Branches::all()->random()->id;
    $productStatusId = Products_status::all()->random()->id;
    $productTypeId = Product_types::all()->random()->id;
    $identity = Identities::all()->random()->id;
    $name = $faker->unique()->word;
    $active = (int)$faker->boolean;
    $mainPeriod = $faker->uuid;
    
    return [
        'branch_id'=>$branchId,
        'product_status_id'=>$productStatusId,
        'product_type_id'=>$productTypeId,
        'idIdentityCreated'=>$identity,
        'name'=>$name,
        'active'=>$active,
        'main_period'=>$mainPeriod,
    ];
});

$factory->state(Products::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});

$factory->state(Products::class, 'invalidDescription', function (Faker $faker) {
    $description = $faker->unique()->lexify(str_repeat('?', 201));
    return [
        'description'=>$description,
    ];
});