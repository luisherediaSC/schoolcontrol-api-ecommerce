<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Enrollment_statusRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Enrollment_status';        
    }
    
}
