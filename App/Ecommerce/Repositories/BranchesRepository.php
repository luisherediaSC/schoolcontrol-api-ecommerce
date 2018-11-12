<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Jorge Alberto Arenas Gutiérrez
 */
class BranchesRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Branches';        
    }
    
}
