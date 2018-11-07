<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Product_modelsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'product_models';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'product_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'model_id',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
