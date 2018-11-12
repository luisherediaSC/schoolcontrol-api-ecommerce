<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Branch_contentsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Branch_contents';        
    }
    
}
