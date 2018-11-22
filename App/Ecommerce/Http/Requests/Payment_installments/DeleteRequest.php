<?php

namespace App\Ecommerce\Http\Requests\Payment_installments;

use Melisa\Laravel\Http\Requests\DeleteRequest as Request;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class DeleteRequest extends Request
{
    
    protected $rules = [
        'id'=>'required|xss|size:36|exists:ecommerce.payment_installments,id'
    ];
    
    protected $errorCode = [
        'id'=>'ecommerce.fr.pay_inst.id'
    ];
    
}
