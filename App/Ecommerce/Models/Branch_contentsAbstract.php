<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Branch_contentsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'branch_contents';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'branch_id',
        'content_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
