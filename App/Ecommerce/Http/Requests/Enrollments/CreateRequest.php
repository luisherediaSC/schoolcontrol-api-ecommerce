<?php

namespace App\Ecommerce\Http\Requests\Enrollments;

use Melisa\Laravel\Http\Requests\Generic;
use Melisa\Sanitizes\BeforeSanitize;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class CreateRequest extends Generic
{
    use BeforeSanitize; 
    
    protected $rules = [
        'payment_installment_id'=>'required|xss|size:36|exists:ecommerce.payment_installments,id',
        'enrollment_status_id'=>'required|xss|integer|exists:ecommerce.enrollment_status,id',
    ];
    
    protected $sanitizes = [
        'active'=>'boolean',
    ];
    
}
