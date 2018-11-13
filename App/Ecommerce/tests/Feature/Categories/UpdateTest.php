<?php

namespace App\Ecommerce\Tests\Feature\Categories;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Categories, Branches};

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class UpdateTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/categories';
    
    /**
     * @group categories
     * @group update
     * @group completed
     * @test
     */
    public function invalid_name()
    {
        factory(Branches::class)->create();
        $category = factory(Categories::class)
            ->create()
            ->toArray();
        $categoryInvalidName = factory(Categories::class)
            ->state('invalidName')
            ->make();
        $category ['name']= $categoryInvalidName->name;
        $endpoint = "{$this->endpoint}/{$category['id']}";
        $response = $this->apiPut($endpoint, $category);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.name');
    }
    
    /**
     * @group categories
     * @group update
     * @group completed
     * @test
     */
    public function invalid_description()
    {
        factory(Branches::class)->create();
        $category = factory(Categories::class)
            ->create()
            ->toArray();
        $categoryInvalidDescription = factory(Categories::class)
            ->state('invalidDescription')
            ->make();
        $category ['description']= $categoryInvalidDescription->description;
        $endpoint = "{$this->endpoint}/{$category['id']}";
        $response = $this->apiPut($endpoint, $category);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.desc');
    }
    
    /**
     * @group categories
     * @group update
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        $category = factory(Categories::class)
            ->create()
            ->toArray();
        $endpoint = "{$this->endpoint}/{$category['id']}";
        $response = $this->apiPut($endpoint, $category);
        $this->responseSuccess($response);
        $result = json_decode($response->getContent());
        $this->assertDatabaseHas('categories', [
            'name'=>$category['name'],
            'id'=>$category['id'],
            'idIdentityUpdated'=>$result->data->idIdentityUpdated,
            'updatedAt'=>$result->data->updatedAt,
            'description'=>$category['description'],
        ], 'ecommerce');
    }
    
    /**
     * @group categories
     * @group update
     * @group completed
     * @test
     */
    public function invalid_integer_id()
    {
        $endpoint = "{$this->endpoint}/asdfghj";
        $response = $this->apiPut($endpoint);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.id');
    }
    
    /**
     * @group categories
     * @group update
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
        $response = $this->apiPut($endpoint, $category);
        $this->responseWithErrors($response);
        $this->responseWithError($response, 'ecommerce.fr.cat.id');
    }
    
}
