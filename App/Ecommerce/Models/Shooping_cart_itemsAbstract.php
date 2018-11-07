<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Shooping_cart_itemsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'shooping_cart_items';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'product_id',
        'shooping_cart_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'quantity',
        'amount',
        'subtotal',
        'createdAt',
        'updatedAt'
    ];    
}
