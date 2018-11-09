<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Product_contents, Product_models};

$factory->define(Product_contents::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $productModelId = Product_models::all()->random()->id;
    $contentId = $faker->uuid;
    
    return [
        'identity'=>$identity,
        'product_model_id'=>$productModelId,
        'content_id'=>$contentId,
    ];
});