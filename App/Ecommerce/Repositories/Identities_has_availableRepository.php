<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Identities_has_availableRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Identities_has_available';        
    }
    
}
