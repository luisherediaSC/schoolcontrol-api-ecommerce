<?php

namespace App\Ecommerce\Http\Requests\Products;

use App\Ecommerce\Http\Requests\Products\CreateRequest;

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
        $errorCode ['id']= 'ecommerce.fr.pro.id';
        return $errorCode;
    }
    
    public function rules()
    {        
        $rules=parent::rules();
        $rules['id']='required|xss|size:36|exists:ecommerce.products,id';
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



