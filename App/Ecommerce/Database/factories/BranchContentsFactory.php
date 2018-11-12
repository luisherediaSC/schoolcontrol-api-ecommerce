<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Branches, Branch_contents};

$factory->define(Branch_contents::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $branchId = Branches::all()->random()->id;
    $contentId = $faker->uuid;
    
    return [
        'idIdentityCreated'=>$identity,
        'branch_id'=>$branchId,
        'content_id'=>$contentId,
    ];
});
