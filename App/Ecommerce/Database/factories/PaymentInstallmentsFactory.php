<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Payment_installments, Payment_arrangements};

$factory->define(Payment_installments::class, function (Faker $faker) {
    $paymentArrangementId = Payment_arrangements::all()->random()->id;
    $identity = Identities::all()->random()->id;
    $order = mt_rand(1, 5);
    $baseAmount = $faker->randomFloat(2,1,10000);
    $active = (int)$faker->boolean;
    $name = $faker->word;
    
    return [
        'payment_arrangement_id'=>$paymentArrangementId,
        'idIdentityCreated'=>$identity,
        'order'=>$order,
        'base_amount'=>$baseAmount,
        'active'=>$active,
        'name'=>$name,
    ];
});

$factory->state(Payment_installments::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});