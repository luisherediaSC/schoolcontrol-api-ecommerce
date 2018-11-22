<?php

namespace App\Ecommerce\Tests\Feature\PaymentInstallments;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Ecommerce\Tests\TestCase;

class TableTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * @group payment_installments
     * @group table
     * @group completed
     * @test
     */
    public function exist_table()
    {
        $this->existTable('payment_installments', 'ecommerce');
    }
    
    /**
     * @group payment_installments
     * @group table
     * @group completed
     * @test
     */
    public function exist_columns()
    {
        $this->existColumns('payment_installments', [
            'id',
            'payment_arrangement_id',
            'idIdentityCreated',
            'idIdentityUpdated',
            'order',
            'base_amount',
            'name',
            'active',
            'logic_bussiness',
        ], 'ecommerce');
    }
    
}
