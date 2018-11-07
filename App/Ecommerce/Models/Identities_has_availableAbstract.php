<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Identities_has_availableAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'identities_has_available';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'payment_arrangement_id',
        'identity_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
