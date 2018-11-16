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
class DeleteTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/products';
    
    /**
     * @group products
     * @group delete
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product = factory(Products::class)
                    ->create();
        $endpoint = "$this->endpoint/{$product->id}";
        $response = $this->apiDelete($endpoint);
        $this->responseSuccess($response);
        $this->assertDatabaseMissing($product->getTable(), [
            'id'=>$product->id,
        ], 'ecommerce');
    }
    
    /**
     * @group products
     * @group delete
     * @group completed
     * @test
     */
    public function invalid_id()
    {
        $response = $this->apiDelete($this->endpoint . '/1');
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.id');
    }
    
    /**
     * @group products
     * @group delete
     * @group completed
     * @test
     */
    public function no_exist_id()
    {
        $response = $this
                ->apiDelete($this->endpoint . '/00aa00aa00aa00aa00aa00aa00aa00aa00aa');
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pro.id');
    }
    
}
