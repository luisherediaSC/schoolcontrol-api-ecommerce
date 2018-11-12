<?php

namespace App\Ecommerce\Http\Requests\Branches;

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
        'name'=>'nullable|max:150|xss',        
    ];
    
    protected $errorCode = [
        'page'=>'ecommerce.fr.bra.page',
        'start'=>'ecommerce.fr.bra.start',
        'limit'=>'ecommerce.fr.bra.limit',
    ];

}