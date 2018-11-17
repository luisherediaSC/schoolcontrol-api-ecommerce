<?php

namespace App\Ecommerce\Http\Requests\Payment_arrangements;

use Melisa\Laravel\Http\Requests\DeleteRequest as Request;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class DeleteRequest extends Request
{
    
    protected $rules = [
        'id'=>'required|xss|size:36|exists:ecommerce.payment_arrangements,id'
    ];
    
    protected $errorCode = [
        'id'=>'ecommerce.fr.pay_arr.id'
    ];
    
}
