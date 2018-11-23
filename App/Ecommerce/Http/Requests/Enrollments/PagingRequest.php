<?php

namespace App\Ecommerce\Http\Requests\Enrollments;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */

class PagingRequest extends WithFilter
{
    protected $rules = [
        'page'=>'required|xss|numeric',
        'start'=>'required|xss|numeric',
        'limit'=>'required|xss|numeric',
        'filter'=>'sometimes|json|filter:name',
        'query'=>'sometimes',
    ];
    
    public $rulesFilters = [
        'payment_installment_id'
            =>'nullable|size:36|xss|exists:ecommerce.payment_installments,id',
        'enrollment_status_id'
            =>'nullable|integer|xss|exists:ecommerce.enrollment_status,id',
    ];
    
    protected $errorCode = [
        'page'=>'ecommerce.fr.enr.page',
        'start'=>'ecommerce.fr.enr.start',
        'limit'=>'ecommerce.fr.enr.limit',
    ];

}