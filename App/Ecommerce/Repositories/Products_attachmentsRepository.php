<?php

namespace App\Ecommerce\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Products_attachmentsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Ecommerce\Models\Products_attachments';        
    }
    
}
