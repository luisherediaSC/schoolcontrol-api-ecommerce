<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class EnrollmentsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Enrollments';        
    }
    
}
