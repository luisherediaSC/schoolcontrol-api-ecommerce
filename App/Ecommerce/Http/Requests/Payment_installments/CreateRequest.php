<?php

namespace App\Ecommerce\Http\Requests\Payment_installments;

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
        'payment_arrangement_id'=>'required|xss|size:36|exists:ecommerce.payment_arrangements,id',
        'order'=>'required|xss|integer',
        'base_amount' => 'required|xss|numeric',
        'active'=>'required|xss|boolean',
        'name' => 'sometimes|xss|max:75',
        'logic_bussiness' => 'sometimes|xss|max:255',
    ];
    
    protected $sanitizes = [
        'active'=>'boolean',
    ];
    
    protected $errorCode = [
        'name'=>'ecommerce.fr.pay_inst.name',
    ];
    
}
