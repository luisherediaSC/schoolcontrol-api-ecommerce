<?php

namespace App\Ecommerce\Http\Requests\Payment_arrangements;

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
        'product_id'=>'required|xss|size:36|exists:ecommerce.products,id',
        'name' => 'required|xss|max:75',
        'active'=>'required|xss|boolean',
        'is_public'=>'required|xss|boolean',
    ];
    
    protected $sanitizes = [
        'active'=>'boolean',
        'is_public'=>'boolean'
    ];
    
    protected $errorCode = [
        'name'=>'ecommerce.fr.pay_arr.name',
    ];
    
}
