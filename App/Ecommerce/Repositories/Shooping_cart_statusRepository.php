<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Shooping_cart_statusRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Shooping_cart_status';        
    }
    
}
