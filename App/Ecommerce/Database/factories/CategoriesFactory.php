<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Branches, Categories};

$factory->define(Categories::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $branchId = Branches::all()->random()->id;
    $name = $faker->unique()->word;
    $active = (int)$faker->boolean;
    $description = $faker->text(25, 200);
    
    return [
        'idIdentityCreated'=>$identity,
        'branch_id'=>$branchId,
        'name'=>$name,
        'active'=>$active,
        'description'=>$description,        
    ];
});

$factory->state(Categories::class, 'invalidName', function (Faker $faker) {
    $name = $faker->unique()->lexify(str_repeat('?', 76));
    return [
        'name'=>$name,
    ];
});

$factory->state(Categories::class, 'invalidDescription', function (Faker $faker) {
    $description = $faker->unique()->lexify(str_repeat('?', 201));
    return [
        'description'=>$description,
    ];
});