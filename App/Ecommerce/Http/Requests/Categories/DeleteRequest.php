<?php

namespace App\Ecommerce\Http\Requests\Categories;

use Melisa\Laravel\Http\Requests\DeleteRequest as Request;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class DeleteRequest extends Request
{
    
    protected $rules = [
        'id'=>'required|xss|integer|exists:ecommerce.categories,id'
    ];
    
    protected $errorCode = [
        'id'=>'ecommerce.fr.cat.id'
    ];
    
}
