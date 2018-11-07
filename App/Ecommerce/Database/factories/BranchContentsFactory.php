<?php

use Faker\Generator as Faker;
use App\Core\Models\Identities;
use App\Ecommerce\Models\{Branches, Branch_contents, Branch_models};

$factory->define(Branch_contents::class, function (Faker $faker) {
    $identity = Identities::all()->random()->id;
    $branchModelId = Branch_models::all()->random()->id;
    $contentId = $faker->uuid;
    
    return [
        'idIdentityCreated'=>$identity,
        'branch_model_id'=>$branchModelId,
        'content_id'=>$contentId,
    ];
});
