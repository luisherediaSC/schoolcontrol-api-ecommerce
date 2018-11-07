<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class Payment_arrangementsAbstract extends BaseUuid
{    
    protected $connection = 'ecommerce';
    protected $table = 'payment_arrangements';
    public $timestamps = true;
    /* incrementing */
    protected $fillable = [
        'id',
        'product_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'name',
        'active',
        'is_public',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
