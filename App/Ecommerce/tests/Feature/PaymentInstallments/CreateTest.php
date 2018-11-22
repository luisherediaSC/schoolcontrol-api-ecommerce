<?php

namespace App\Ecommerce\Tests\Feature\PaymentInstallments;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Branches, Product_types, Products_status, Products};
use App\Ecommerce\Models\{Payment_arrangements,Payment_installments};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class CreateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/payment_installments';
    
    /**
     * @group payment_installments
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
        factory(Payment_arrangements::class)->create();
        $paymentInstallment= factory(Payment_installments::class)
            ->state('invalidName')
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $paymentInstallment);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_inst.name');
    }
    
    /**
     * @group payment_installments
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
        factory(Payment_arrangements::class)->create();
        $paymentInstallment= factory(Payment_installments::class)
            ->make()
            ->toArray();
        $response = $this->apiPost($this->endpoint, $paymentInstallment);
        $this->responseCreatedSuccess($response);
        $this->assertDatabaseHas('payment_installments', [
            'name'=> $paymentInstallment['name'],
            'payment_arrangement_id'=>$paymentInstallment['payment_arrangement_id'],
        ], 'ecommerce');
    }
    
    /**
     * @group payment_installments
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
