<?php

namespace App\Ecommerce\Tests\Feature\Categories;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Categories, Branches};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class CreateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/categories';
    
    /**
     * @group categories
     * @group create
     * @group completed
     * @test
     */
    public function invalid_name()
    {
        factory(Branches::class)
            ->create();
        $category = factory(Categories::class)
            ->state('invalidName')
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $category);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.name');
    }
    
    /**
     * @group categories
     * @group create
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)
            ->create();
        $category = factory(Categories::class)
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $category);
        $this->responseCreatedSuccess($response);
        $this->assertDatabaseHas('categories', [
            'name'=> $category['name'],
            'branch_id'=> $category['branch_id'],
        ], 'ecommerce');
    }
    
    /**
     * @group categories
     * @group create
     * @group completed
     * @test
     */
    public function no_input()
    {
        $response = $this->apiPost($this->endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.name');
    }
    
}
