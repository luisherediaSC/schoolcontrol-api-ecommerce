<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Shooping_cart, Shooping_cart_status};

$factory->define(Shooping_cart::class, function (Faker $faker) {
    $shoopingCartStatusId = Shooping_cart_status::all()->random()->id;
    $totalProducts = mt_rand(1, 9);
    $identity = Identities::all()->random()->id;
    $subtotal = $faker->randomFloat(2, 1, 10000);
    $ivaApply = $subtotal * 0.16;
    $total = $subtotal + $ivaApply;
    
    return [
        'shooping_cart_status_id'=>$shoopingCartStatusId,
        'total_products'=>$totalProducts,
        'identity'=>$identity,
        'subtotal'=>$subtotal,
        'iva_apply'=>$ivaApply,
        'total'=>$total,
    ];
});