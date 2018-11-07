<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Payment_detailsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'payment_details';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'enrollment_id',
        'payment_id',
        'identity_id',
        'quantity',
        'amount',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
