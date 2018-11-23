<?php

namespace App\Ecommerce\Http\Requests\Enrollments;

use Melisa\Laravel\Http\Requests\DeleteRequest as Request;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class DeleteRequest extends Request
{
    
    protected $rules = [
        'id'=>'required|xss|integer|exists:ecommerce.enrollments,id'
    ];
    
    protected $errorCode = [
        'id'=>'ecommerce.fr.enr.id'
    ];
    
}
