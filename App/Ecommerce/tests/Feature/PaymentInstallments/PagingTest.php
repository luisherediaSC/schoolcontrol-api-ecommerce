<?php

namespace App\Ecommerce\Tests\Feature\PaymentInstallments;

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
class PagingTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/payment_installments';
    
    /**
     * @group payment_installments
     * @group paging
     * @group completed
     * @test
     */
    public function valid_input()
    {
        factory(Branches::class, 3)->create();
        factory(Product_types::class, 3)->create();
        factory(Products_status::class, 3)->create();
        factory(Products::class, 15)->create();
        factory(Payment_arrangements::class, 20)->create();
        factory(Payment_installments::class, 80)->create();
        $response = $this->apiGet($this->endpoint, [
            'page'=>1,
            'limit'=>50,
            'start'=>1  
        ]);
        $this->responsePagingSuccess($response);
    }
    
    /**
     * @group payment_installments
     * @group paging
     * @group completed
     * @test
     */
    public function no_input()
    {
        $response = $this->apiGet($this->endpoint);
        $this->responseWithErrors($response);
    }
    
}