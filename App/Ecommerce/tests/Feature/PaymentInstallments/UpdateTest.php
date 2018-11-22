<?php

namespace App\Ecommerce\Tests\Feature\PaymentInstallments;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Branches, Product_types, Products_status, Products};
use App\Ecommerce\Models\Payment_arrangements;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class UpdateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/payment_arrangements';
    
    /**
     * @group payment_arrangements
     * @group update
     * @group completed
     * @test
     */
    public function invalid_name()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        factory(Products::class)->create();
        $paymentArrangement = factory(Payment_arrangements::class)
            ->create()
            ->toArray();
        $paymentArrangementInvalidName = factory(Payment_arrangements::class)
            ->state('invalidName')
            ->make();
        $paymentArrangement ['name']= $paymentArrangementInvalidName->name;
        $endpoint = "{$this->endpoint}/{$paymentArrangement['id']}";
        $response = $this->apiPut($endpoint, $paymentArrangement);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_arr.name');
    }
    
    /**
     * @group payment_arrangements
     * @group update
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        factory(Products::class)->create();
        $paymentArrangement = factory(Payment_arrangements::class)
            ->create()
            ->toArray();
        $endpoint = "{$this->endpoint}/{$paymentArrangement['id']}";
        $response = $this->apiPut($endpoint, $paymentArrangement);
        $this->responseSuccess($response);
        $result = json_decode($response->getContent());
        $this->assertDatabaseHas('payment_arrangements', [
            'name'=>$paymentArrangement['name'],
            'id'=>$paymentArrangement['id'],
            'idIdentityUpdated'=>$result->data->idIdentityUpdated,
            'updatedAt'=>$result->data->updatedAt,
        ], 'ecommerce');
    }
    
    /**
     * @group payment_arrangements
     * @group update
     * @group completed
     * @test
     */
    public function invalid_uuid_id()
    {
        $endpoint = "{$this->endpoint}/1";
        $response = $this->apiPut($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_arr.id');
    }
    
    /**
     * @group payment_arrangements
     * @group update
     * @group completed
     * @test
     */
    public function no_exist_id()
    {
        $endpoint = "{$this->endpoint}/00aa00aa00aa00aa00aa00aa00aa00aa00aa";
        $response = $this->apiPut($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_arr.id');
    }
    
}
