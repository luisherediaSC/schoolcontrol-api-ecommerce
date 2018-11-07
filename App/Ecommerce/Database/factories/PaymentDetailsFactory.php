<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\{Payment_details, Enrollments, Payments};

$factory->define(Payment_details::class, function (Faker $faker) {
    $paymentId = Payments::all()->random()->id;
    $identity_id = $faker->uuid;
    $enrollmentId = Enrollments::all()->random()->id;
    $quantity = mt_rand(1, 9);
    $baseAmount = $faker->randomFloat(2,1,10000);
    $amount = $quantity * $baseAmount;
    $active = (int)$faker->boolean;
    $isPublic = (int)$faker->boolean;
    
    return [
        'product_id'=>$productId,
        'identity'=>$identity,
        'name'=>$name,
        'active'=>$active,
        'is_public'=>$isPublic,
    ];
});

$factory->state(Payment_arrangements::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});