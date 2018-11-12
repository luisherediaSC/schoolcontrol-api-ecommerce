<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class MigrationsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Migrations';        
    }
    
}
