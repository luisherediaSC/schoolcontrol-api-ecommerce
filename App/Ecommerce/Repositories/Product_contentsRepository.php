<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Product_contentsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Product_contents';        
    }
    
}
