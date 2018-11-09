<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\{Shooping_cart, Shooping_cart_items, Products};

$factory->define(Shooping_cart_items::class, function (Faker $faker) {
    $shoopingCartId = Shooping_cart::all()->random()->id;
    $productId = Products::all()->random()->id;
    $quantity = mt_rand(1, 9);
    $amount = $faker->randomFloat(2, 1, 10000);
    $subtotal = $quantity * $amount;
    
    return [
        'shooping_cart_id'=>$shoopingCartId,
        'product_id'=>$productId,
        'quantity'=>$quantity,
        'amount'=>$amount,
        'subtotal'=>$subtotal,
    ];
});