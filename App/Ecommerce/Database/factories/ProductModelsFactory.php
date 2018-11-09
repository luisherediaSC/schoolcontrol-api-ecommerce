<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Product_models, Products};

$factory->define(Product_models::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $productId = Products::all()->random()->id;
    $modelId = $faker->uuid;
    
    return [
        'identity'=>$identity,
        'product_id'=>$productId,
        'model_id'=>$modelId,
    ];
});