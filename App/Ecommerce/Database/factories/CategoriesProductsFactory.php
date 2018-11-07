<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Categories, Products};

$factory->define(Categories_products::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $categoryId = Categories::all()->random()->id;
    $productId = Products::all()->random()->id;
    
    return [
        'idIdentityCreated'=>$identity,
        'category_id'=>$categoryId,
        'product_id'=>$productId,
    ];
});