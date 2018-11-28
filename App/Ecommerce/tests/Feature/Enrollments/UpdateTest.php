<?php

namespace App\Ecommerce\Tests\Feature\Enrollments;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Branches, Product_types, Products_status, Products};
use App\Ecommerce\Models\{Payment_arrangements, Payment_installments};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class UpdateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/payment_installments';
    
    /**
     * @group payment_installments
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
        factory(Payment_arrangements::class)->create();
        $paymentInstallment = factory(Payment_installments::class)
            ->create()
            ->toArray();
        $paymentInstallmentInvalidName = factory(Payment_arrangements::class)
            ->state('invalidName')
            ->make();
        $paymentInstallment ['name']= $paymentInstallmentInvalidName->name;
        $endpoint = "{$this->endpoint}/{$paymentInstallment['id']}";
        $response = $this->apiPut($endpoint, $paymentInstallment);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_inst.name');
    }
    
    /**
     * @group payment_installments
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
        factory(Payment_arrangements::class)->create();
        $paymentInstallment = factory(Payment_installments::class)
            ->create()
            ->toArray();
        $endpoint = "{$this->endpoint}/{$paymentInstallment['id']}";
        $response = $this->apiPut($endpoint, $paymentInstallment);
        $this->responseSuccess($response);
        $result = json_decode($response->getContent());
        $this->assertDatabaseHas('payment_installments', [
            'name'=>$paymentInstallment['name'],
            'id'=>$paymentInstallment['id'],
            'idIdentityUpdated'=>$result->data->idIdentityUpdated,
            'updatedAt'=>$result->data->updatedAt,
        ], 'ecommerce');
    }
    
    /**
     * @group payment_installments
     * @group update
     * @group completed
     * @test
     */
    public function invalid_uuid_id()
    {
        $endpoint = "{$this->endpoint}/1";
        $response = $this->apiPut($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_inst.id');
    }
    
    /**
     * @group payment_installments
     * @group update
     * @group completed
     * @test
     */
    public function no_exist_id()
    {
        $endpoint = "{$this->endpoint}/00aa00aa00aa00aa00aa00aa00aa00aa00aa";
        $response = $this->apiPut($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_inst.id');
    }
    
}
