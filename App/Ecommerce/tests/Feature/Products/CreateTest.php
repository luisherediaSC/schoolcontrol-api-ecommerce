<?php

namespace App\Ecommerce\Tests\Feature\Products;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Product_types, Products_status, Products, Branches};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class CreateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/products';
    
    /**
     * @group products
     * @group create
     * @group completed
     * @test
     */
    public function invalid_name()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product= factory(Products::class)
            ->state('invalidName')
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $product);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.name');
    }
    
    /**
     * @group products
     * @group create
     * @group completed
     * @test
     */
    public function invalid_description()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product= factory(Products::class)
            ->state('invalidDescription')
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $product);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.desc');
    }
    
    /**
     * @group products
     * @group create
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product= factory(Products::class)
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $product);
        $this->responseCreatedSuccess($response);
        $this->assertDatabaseHas('products', [
            'name'=> $product['name'],
            'branch_id'=> $product['branch_id'],
        ], 'ecommerce');
    }
    
    /**
     * @group products
     * @group create
     * @group completed
     * @test
     */
    public function no_input()
    {
        $response = $this->apiPost($this->endpoint);
        $this->responseWithErrors($response);
    }
    
}
