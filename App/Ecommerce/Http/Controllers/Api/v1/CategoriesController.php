<?php

namespace App\Ecommerce\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\ApiCrudController;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */

class CategoriesController extends ApiCrudController
{
    protected $delete = [
        'request'=>'Categories\DeleteRequest'
    ];
    
    protected $update = [
        'request'=>'Categories\UpdateRequest'
    ];
}