<?php

namespace App\Ecommerce\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\ApiCrudController;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */

class Payment_installmentsController extends ApiCrudController
{
    protected $delete = [
        'request'=>'Payment_installments\DeleteRequest'
    ];
    
    protected $update = [
        'request'=>'Payment_installments\UpdateRequest'
    ];
}