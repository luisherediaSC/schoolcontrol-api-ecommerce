<?php

namespace App\Ecommerce\Tests\Feature\Producs;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Ecommerce\Tests\TestCase;

class TableTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * @group products
     * @group table
     * @group completed
     * @test
     */
    public function exist_table()
    {
        $this->existTable('products', 'ecommerce');
    }
    
    /**
     * @group products
     * @group table
     * @group completed
     * @test
     */
    public function exist_columns()
    {
        $this->existColumns('products', [
            'id',
            'idIdentityCreated',
            'idIdentityUpdated',
            'branch_id',
            'product_status_id',
            'product_type_id',
            'name',
            'active',
            'main_period',
            'description',
        ], 'ecommerce');
    }
    
}
