<?php

namespace App\Ecommerce\Tests\Feature\Categories;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Ecommerce\Tests\TestCase;

class TableTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * @group categories
     * @group table
     * @group completed
     * @test
     */
    public function exist_table()
    {
        $this->existTable('categories', 'ecommerce');
    }
    
    /**
     * @group categories
     * @group table
     * @group completed
     * @test
     */
    public function exist_columns()
    {
        $this->existColumns('categories', [
            'id',
            'idIdentityCreated',
            'idIdentityUpdated',
            'branch_id',
            'name',
            'active',
            'parent_id',
            'description',
        ], 'ecommerce');
    }
    
}
