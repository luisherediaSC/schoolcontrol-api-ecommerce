<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Payment_arrangements, Identities_has_available};

$factory->define(Identities_has_available::class, function (Faker $faker) {
    $paymentArrangementId = Payment_arrangements::all()->random()->id;
    $identityId = $faker->uuid;
    $identity = Identities::all()->random()->id;
    
    return [
        'payment_arrangement_id'=>$paymentArrangementId,
        'identity_id'=>$identityId,
        'identity'=>$identity,
    ];
});