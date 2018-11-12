<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Categories_productsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Categories_products';        
    }
    
}
