<?php

namespace App\Ecommerce\Http\Requests\Payment_arrangements;

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
        'name'=>'nullable|max:75|xss',        
    ];
    
    protected $errorCode = [
        'page'=>'ecommerce.fr.pay_arr.page',
        'start'=>'ecommerce.fr.pay_arr.start',
        'limit'=>'ecommerce.fr.pay_arr.limit',
    ];

}