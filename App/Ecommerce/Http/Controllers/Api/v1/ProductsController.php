<?php

namespace App\Ecommerce\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\ApiCrudController;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */

class ProductsController extends ApiCrudController
{
    protected $delete = [
        'request'=>'Products\DeleteRequest'
    ];
    
    protected $update = [
        'request'=>'Products\UpdateRequest'
    ];
}