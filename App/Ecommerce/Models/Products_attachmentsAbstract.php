<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class Products_attachmentsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'products_attachments';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'product_id',
        'file_id',
        'content_id',
        'idIdentityCreated',
        'idIdentityUpdated',
        'active',
        'createdAt',
        'updatedAt',
        'deleted_at'
    ];    
}
