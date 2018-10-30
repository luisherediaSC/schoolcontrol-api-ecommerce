<?php

namespace App\Ecommerce\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class OptionsSeeder extends InstallSeeder
{
    
    public function run()
    {
        $this->installOption('option.ecommerce.access', [
            'name'=>'Option main de aplicación ecommerce',
            'text'=>'Ecommerce',
            'isSubMenu'=>true,
            'iconClassSmall'=>'x-fa fa fa-cog',
            'iconClassMedium'=>'x-fa fa fa-cog fa-3x',
            'iconClassLarge'=>'x-fa fa fa-cog fa-5x',
        ]);
    }
    
}
