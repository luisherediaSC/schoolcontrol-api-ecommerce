<?php

namespace App\Ecommerce\Tests\Feature\PaymentArrangements;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Product_types, Products_status, Products, Branches};
use App\Ecommerce\Models\Payment_arrangements;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class CreateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/payment_arrangements';
    
    /**
     * @group payment_arrangements
     * @group create
     * @group completed
     * @test
     */
    public function invalid_name()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        factory(Products::class)->create();
        $paymentArrangement= factory(Payment_arrangements::class)
            ->state('invalidName')
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $paymentArrangement);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_arr.name');
    }
    
    /**
     * @group payment_arrangements
     * @group create
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        factory(Products::class)->create();
        $paymentArrangement= factory(Payment_arrangements::class)
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $paymentArrangement);
        $this->responseCreatedSuccess($response);
        $this->assertDatabaseHas('payment_arrangements', [
            'name'=> $paymentArrangement['name'],
            'product_id'=> $paymentArrangement['product_id'],
        ], 'ecommerce');
    }
    
    /**
     * @group payment_arrangements
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
