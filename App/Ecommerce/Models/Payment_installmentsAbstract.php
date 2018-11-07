<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class Payment_installmentsAbstract extends BaseUuid
{    
    protected $connection = 'ecommerce';
    protected $table = 'payment_installments';
    public $timestamps = true;
    /* incrementing */
    protected $fillable = [
        'id',
        'payment_arrangement_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'order',
        'base_amount',
        'active',
        'createdAt',
        'updatedAt',
        'deleted_at',
        'name',
        'logic_bussiness'
    ];    
}
