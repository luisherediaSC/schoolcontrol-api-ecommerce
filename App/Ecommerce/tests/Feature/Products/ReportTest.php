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
class ReportTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/products';
    
    /**
     * @group products
     * @group report
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        $product = factory(Products::class)->create();
        $endpoint = "$this->endpoint/{$product->id}";
        $response = $this->apiGet($endpoint);
        $this->responseSuccess($response);
        $this->assertDatabaseHas($product->getTable(), [
            'id'=>$product->id
        ], 'ecommerce');
        /* verify minimum required fields of the frontend */
        $result = json_decode($response->getContent());
        $this->assertTrue($result->data->id === $product->id);
        $this->assertTrue(isset($result->data->name));
    }
    
    /**
     * @group products
     * @group report
     * @group completed
     * @test
     */
    public function invalid_id()
    {
        $response = $this->apiGet($this->endpoint . '/1');
        $this->responseWithErrors($response);
    }
    
    /**
     * @group products
     * @group report
     * @group completed
     * @test
     */
    public function no_exist_id()
    {
        $endpoint = "{$this->endpoint}/00aa00aa00aa00aa00aa00aa00aa00aa00aa";
        $response = $this->apiGet($endpoint);
        $this->responseWithErrors($response);
    }
    
}