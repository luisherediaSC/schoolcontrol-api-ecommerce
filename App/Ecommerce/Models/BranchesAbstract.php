<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class BranchesAbstract extends BaseUuid
{    
    protected $connection = 'ecommerce';
    protected $table = 'branches';
    public $timestamps = true;
    /* incrementing */
    protected $fillable = [
        'id',
        'name',
        'createdAt',
        'updatedAt'
    ];    
}
