<?php

namespace App\Ecommerce\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ApplicationSeeder extends InstallSeeder
{
    
    public function run()
    {
        $this->installApplication('ecommerce', [
            'name'=>'Ecommerce',
            'description'=>'Application Ecommerce',
            'nameSpace'=>'Melisa.ecommerce',
            'typeSecurity'=>'art',
            'version'=>'1.0.0'
        ]);
    }
    
}
