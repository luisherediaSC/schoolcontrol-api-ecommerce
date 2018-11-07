<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class Shooping_cartAbstract extends BaseUuid
{    
    protected $connection = 'ecommerce';
    protected $table = 'shooping_cart';
    public $timestamps = true;
    /* incrementing */
    protected $fillable = [
        'id',
        'shooping_cart_status_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'total_products',
        'subtotal',
        'iva_apply',
        'total',
        'createdAt',
        'updatedAt'
    ];    
}
