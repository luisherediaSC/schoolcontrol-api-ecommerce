<?php

namespace App\Ecommerce\Http\Requests\Products;

use Melisa\Laravel\Http\Requests\DeleteRequest as Request;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class DeleteRequest extends Request
{
    
    protected $rules = [
        'id'=>'required|xss|size:36|exists:ecommerce.products,id'
    ];
    
    protected $errorCode = [
        'id'=>'ecommerce.fr.pro.id'
    ];
    
}
