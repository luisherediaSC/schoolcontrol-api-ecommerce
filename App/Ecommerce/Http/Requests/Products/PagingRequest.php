<?php

namespace App\Ecommerce\Http\Requests\Products;

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
        'page'=>'ecommerce.fr.pro.page',
        'start'=>'ecommerce.fr.pro.start',
        'limit'=>'ecommerce.fr.pro.limit',
    ];

}