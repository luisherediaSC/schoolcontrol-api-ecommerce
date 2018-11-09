<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\{Payment_details, Enrollments, Payments};

$factory->define(Payment_details::class, function (Faker $faker) {
    $paymentId = Payments::all()->random()->id;
    $identity_id = $faker->uuid;
    $enrollmentId = Enrollments::all()->random()->id;
    $quantity = mt_rand(1, 5);
    $baseAmount = $faker->randomFloat(2,1,10000);
    $amount = $quantity * $baseAmount;
    
    return [
        'payment_id'=>$paymentId,
        'identity_id'=>$identity_id,
        'enrollment_id'=>$enrollmentId,
        'quantity'=>$quantity,
        'amount'=>$amount,
    ];
});