<?php

namespace App\Ecommerce\Tests\Feature\Categories;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Categories,Branches};


/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class PagingTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/categories';
    
    /**
     * @group categories
     * @group paging
     * @group completed
     * @test
     */
    public function valid_input()
    {
        factory(Branches::class, 3)->create();
        factory(Categories::class, 9)->create();
        $response = $this->apiGet($this->endpoint, [
            'page'=>1,
            'limit'=>50,
            'start'=>1  
        ]);
        $this->responsePagingSuccess($response);
    }
    
    /**
     * @group categories
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