<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class ProductsAbstract extends BaseUuid
{    
    protected $connection = 'ecommerce';
    protected $table = 'products';
    public $timestamps = true;
    /* incrementing */
    protected $fillable = [
        'id',
        'branch_id',
        'product_status_id',
        'product_type_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'name',
        'active',
        'createdAt',
        'updatedAt',
        'deleted_at',
        'description'
    ];    
}
