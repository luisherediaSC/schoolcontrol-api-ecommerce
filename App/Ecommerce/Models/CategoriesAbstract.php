<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class CategoriesAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'categories';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'branch_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'name',
        'createdAt',
        'updatedAt',
        'active',
        'parent_id',
        'description'
    ];    
}
