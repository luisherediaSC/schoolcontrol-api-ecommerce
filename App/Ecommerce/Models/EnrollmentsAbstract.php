<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class EnrollmentsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'enrollments';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'enrollment_status_id',
        'payment_installment_id',
        'identity_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
