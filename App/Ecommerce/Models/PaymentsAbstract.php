<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class PaymentsAbstract extends BaseUuid
{    
    protected $connection = 'ecommerce';
    protected $table = 'payments';
    public $timestamps = true;
    /* incrementing */
    protected $fillable = [
        'id',
        'payment_method_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'total_amount',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
