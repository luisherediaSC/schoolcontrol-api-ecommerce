<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Enrollment_status, Enrollments, Payment_installments};

$factory->define(Enrollments::class, function (Faker $faker) {
    $paymentInstallmentId = Payment_installments::all()->random()->id;
    $identityId = $faker->uuid;
    $enrollmentStatusId = Enrollment_status::all()->random()->id;
    $identity = Identities::all()->random()->id;
    
    return [
        'payment_installments_id'=>$paymentInstallmentId,
        'identity_id'=>$identityId,
        'enrollment_status_id'=>$enrollmentStatusId,
        'identity'=>$identity,
    ];
});