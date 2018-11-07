<?php 

namespace App\Ecommerce\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class MigrationsAbstract extends Base
{    
    protected $connection = 'ecommerce';
    protected $table = 'migrations';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'migration',
        'batch'
    ];    
}
