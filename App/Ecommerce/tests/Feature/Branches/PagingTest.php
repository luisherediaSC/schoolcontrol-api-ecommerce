<?php

namespace App\Ecommerce\Tests\Feature\Branches;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\Branches;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class PagingTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/branches';
    
    /**
     * @group branches
     * @group paging
     * @group completed
     * @test
     */
    public function valid_input()
    {
        factory(Branches::class, 10)->create();
        $response = $this->apiGet($this->endpoint, [
            'page'=>1,
            'limit'=>50,
            'start'=>1  
        ]);
        $this->responsePagingSuccess($response);
    }
    
    /**
     * @group branches
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
