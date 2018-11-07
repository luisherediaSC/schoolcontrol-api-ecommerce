<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Branches, Branch_models};

$factory->define(Branch_models::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $branchId = Branches::all()->random()->id;
    $modelId = $faker->uuid();
    
    return [
        'idIdentityCreated'=>$identity,
        'branch_id'=>$branchId,
        'model_id'=>$modelId,
    ];
});
