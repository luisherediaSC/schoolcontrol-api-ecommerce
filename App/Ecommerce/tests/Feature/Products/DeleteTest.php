<?php

namespace App\Ecommerce\Tests\Feature\Products;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Branches, Categories};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class DeleteTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/categories';
    
    /**
     * @group categories
     * @group delete
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        $category = factory(Categories::class)
                    ->create();
        $endpoint = "$this->endpoint/{$category->id}";
        $response = $this->apiDelete($endpoint);
        $this->responseSuccess($response);
        $this->assertDatabaseMissing($category->getTable(), [
            'id'=>$category->id,
        ], 'ecommerce');
    }
    
    /**
     * @group categories
     * @group delete
     * @group completed
     * @test
     */
    public function invalid_id()
    {
        $response = $this->apiDelete($this->endpoint . '/asdfghj');
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.id');
    }
    
    /**
     * @group categories
     * @group delete
     * @group completed
     * @test
     */
    public function no_exist_id()
    {
        factory(Branches::class)->create();
        $category = factory(Categories::class)
            ->create()
            ->toArray();
        $endpoint = "{$this->endpoint}/-{$category['id']}";
        $response = $this->apiDelete($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.id');
    }
    
}
