<?php

namespace App\Ecommerce\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\ApiCrudController;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */

class Payment_arrangementsController extends ApiCrudController
{
    protected $delete = [
        'request'=>'Payment_arrangements\DeleteRequest'
    ];
    
    protected $update = [
        'request'=>'Payment_arrangements\UpdateRequest'
    ];
}