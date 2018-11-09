<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Product_contentsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'product_contents';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'product_model_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'content_id',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}