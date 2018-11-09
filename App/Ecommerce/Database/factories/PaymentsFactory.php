<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Payment_methods, Payments};

$factory->define(Payments::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $paymentMethodId = Payment_methods::all()->random()->id;
    $totalAmount = $faker->randomFloat(2,1,10000);
    
    return [
        'identity'=>$identity,
        'payment_method_id'=>$paymentMethodId,
        'total_amount'=>$totalAmount,
    ];
});