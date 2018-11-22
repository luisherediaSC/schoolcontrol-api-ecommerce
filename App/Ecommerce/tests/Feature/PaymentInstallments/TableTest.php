<?php

namespace App\Ecommerce\Tests\Feature\PaymentInstallments;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Ecommerce\Tests\TestCase;

class TableTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * @group payment_arrangements
     * @group table
     * @group completed
     * @test
     */
    public function exist_table()
    {
        $this->existTable('payment_arrangements', 'ecommerce');
    }
    
    /**
     * @group payment_arrangements
     * @group table
     * @group completed
     * @test
     */
    public function exist_columns()
    {
        $this->existColumns('payment_arrangements', [
            'id',
            'idIdentityCreated',
            'idIdentityUpdated',
            'product_id',
            'name',
            'active',
            'is_public',
        ], 'ecommerce');
    }
    
}
