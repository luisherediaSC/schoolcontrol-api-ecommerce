<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Categories_productsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'categories_products';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'category_id',
        'product_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
