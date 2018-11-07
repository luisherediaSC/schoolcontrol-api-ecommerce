<?php

use Faker\Generator as Faker;
use App\Ecommerce\Models\Enrollment_status;

$factory->define(Enrollment_status::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    
    return [
        'name'=>$name,
    ];
});

$factory->state(Enrollment_status::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});