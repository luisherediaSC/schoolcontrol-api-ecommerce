<?php

namespace App\Ecommerce\Http\Requests\Payment_arrangements;

use App\Ecommerce\Http\Requests\Payment_arrangements\CreateRequest;

/**
 * 
 *
 * @author Jorge Alberto Arenas Gutiérrez
 */
class UpdateRequest extends CreateRequest
{
    
    public function getErrorCode()
    {
        $errorCode = parent::getErrorCode();
        $errorCode ['id']= 'ecommerce.fr.pay_arr.id';
        return $errorCode;
    }
    
    public function rules()
    {        
        $rules=parent::rules();
        $rules['id']='required|xss|size:36|exists:ecommerce.payment_arrangements,id';
        return $rules;
    }
    
    public function validationData()
    {
        $this->merge([
            'id'=>$this->route('id')
        ]);
        return parent::validationData();
    }
    
}



