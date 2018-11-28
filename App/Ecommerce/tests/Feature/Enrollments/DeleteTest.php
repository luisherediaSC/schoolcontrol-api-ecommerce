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
class DeleteTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/payment_installments';
    
    /**
     * @group payment_installments
     * @group delete
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
                    ->create();
        $endpoint = "$this->endpoint/{$paymentInstallment->id}";
        $response = $this->apiDelete($endpoint);
        $this->responseSuccess($response);
        $this->assertDatabaseMissing($paymentInstallment->getTable(), [
            'id'=>$paymentInstallment->id,
        ], 'ecommerce');
    }
    
    /**
     * @group payment_installments
     * @group delete
     * @group completed
     * @test
     */
    public function invalid_id()
    {
        $response = $this->apiDelete($this->endpoint . '/1');
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_inst.id');
    }
    
    /**
     * @group payment_installments
     * @group delete
     * @group completed
     * @test
     */
    public function no_exist_id()
    {
        $response = $this
                    ->apiDelete
                    ($this->endpoint . '/00aa00aa00aa00aa00aa00aa00aa00aa00aa');
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.pay_inst.id');
    }
    
}
