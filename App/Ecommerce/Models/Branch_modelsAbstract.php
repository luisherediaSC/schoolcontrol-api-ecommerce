<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Branch_modelsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'branch_models';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'branch_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'model_id',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
