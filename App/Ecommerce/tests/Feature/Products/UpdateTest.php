<?php

namespace App\Ecommerce\Tests\Feature\Products;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Branches, Product_types, Products_status, Products};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class UpdateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/products';
    
    /**
     * @group products
     * @group update
     * @group completed
     * @test
     */
    public function invalid_name()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product = factory(Products::class)
            ->create()
            ->toArray();
        $productInvalidName = factory(Products::class)
            ->state('invalidName')
            ->make();
        $product ['name']= $productInvalidName->name;
        $endpoint = "{$this->endpoint}/{$product['id']}";
        $response = $this->apiPut($endpoint, $product);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.name');
    }
    
    /**
     * @group products
     * @group update
     * @group completed
     * @test
     */
    public function invalid_description()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product = factory(Products::class)
            ->create()
            ->toArray();
        $productInvalidDescription = factory(Products::class)
            ->state('invalidDescription')
            ->make();
        $product ['description']= $productInvalidDescription->description;
        $endpoint = "{$this->endpoint}/{$product['id']}";
        $response = $this->apiPut($endpoint, $product);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.desc');
    }
    
    /**
     * @group products
     * @group update
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product = factory(Products::class)
            ->create()
            ->toArray();
        $endpoint = "{$this->endpoint}/{$product['id']}";
        $response = $this->apiPut($endpoint, $product);
        $this->responseSuccess($response);
        $result = json_decode($response->getContent());
        $this->assertDatabaseHas('products', [
            'name'=>$product['name'],
            'id'=>$product['id'],
            'idIdentityUpdated'=>$result->data->idIdentityUpdated,
            'updatedAt'=>$result->data->updatedAt,
        ], 'ecommerce');
    }
    
    /**
     * @group products
     * @group update
     * @group completed
     * @test
     */
    public function invalid_uuid_id()
    {
        $endpoint = "{$this->endpoint}/1";
        $response = $this->apiPut($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.id');
    }
    
    /**
     * @group products
     * @group update
     * @group completed
     * @test
     */
    public function no_exist_id()
    {
        $endpoint = "{$this->endpoint}/00aa00aa00aa00aa00aa00aa00aa00aa00aa";
        $response = $this->apiPut($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.id');
    }
    
}
