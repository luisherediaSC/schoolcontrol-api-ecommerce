<?php
namespace App\Ecommerce\Tests\Feature\Categories;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Melisa\Laravel\Tests\ResponseTrait;
use App\Ecommerce\Tests\TestCase;
use App\Ecommerce\Models\{Branches, Categories};
/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class ReportTest extends TestCase
{
    use DatabaseTransactions;
    use ResponseTrait;
    
    protected $endpoint = 'api/v1/categories';
    
    /**
     * @group categories
     * @group report
     * @group completed
     * @test
     */
    public function success()
    {
        factory(Branches::class)->create();
        $category = factory(Categories::class)->create();
        $endpoint = "$this->endpoint/{$category->id}";
        $response = $this->apiGet($endpoint);
        $this->responseSuccess($response);
        $this->assertDatabaseHas($category->getTable(), [
            'id'=>$category->id
        ], 'ecommerce');
        /* verify minimum required fields of the frontend */
        $result = json_decode($response->getContent());
        $this->assertTrue($result->data->id === $category->id);
        $this->assertTrue(isset($result->data->name));
    }
    
    /**
     * @group categories
     * @group report
     * @group completed
     * @test
     */
    public function invalid_id()
    {
        $response = $this->apiGet($this->endpoint . '/asdfghj');
        $this->responseWithErrors($response);
    }
    
    /**
     * @group categories
     * @group report
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
        $response = $this->apiGet($endpoint);
        $this->responseWithErrors($response);
    }
    
}