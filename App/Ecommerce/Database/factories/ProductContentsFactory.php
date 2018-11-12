<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Product_contents, Products};

$factory->define(Product_contents::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $productId = Products::all()->random()->id;
    $contentId = $faker->uuid;
    
    return [
        'identity'=>$identity,
        'product_id'=>$productId,
        'content_id'=>$contentId,
    ];
});