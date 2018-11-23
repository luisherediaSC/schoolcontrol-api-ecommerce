<?php

namespace App\Ecommerce\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\ApiCrudController;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */

class EnrollmentsController extends ApiCrudController
{
    protected $delete = [
        'request'=>'Enrollments\DeleteRequest'
    ];
    
    protected $update = [
        'request'=>'Enrollments\UpdateRequest'
    ];
}