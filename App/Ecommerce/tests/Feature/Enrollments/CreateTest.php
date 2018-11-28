<?php

namespace App\Ecommerce\Tests\Feature\Enrollments;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Branches, Product_types, Products_status, Products};
use App\Ecommerce\Models\{Payment_arrangements,Payment_installments};
use App\Ecommerce\Models\{Enrollments, Enrollment_status};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class CreateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/enrollments';
    
    /**
     * @group enrollments
     * @group create
     * @group current
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        factory(Product_types::class)->create();
        factory(Products_status::class)->create();
        factory(Products::class)->create();
        factory(Payment_arrangements::class)->create();
        factory(Payment_installments::class)->create();
        factory(Enrollment_status::class)->create();
        $enrollment= factory(Enrollments::class)
            ->make()
            ->toArray();//dd($enrollment);
        $response = $this->apiPost($this->endpoint, $enrollment);
        $this->responseCreatedSuccess($response);
        $this->assertDatabaseHas('enrollments', [
            'payment_installment_id'=> $enrollment['payment_installment_id'],
            'identity_id'=>$enrollment['identity_id'],
        ], 'ecommerce');
    }
    
    /**
     * @group enrollments
     * @group create
     * @group pending
     * @test
     */
    public function no_input()
    {
        $response = $this->apiPost($this->endpoint);
        $this->responseWithErrors($response);
    }
    
}
