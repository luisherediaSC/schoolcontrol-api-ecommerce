<?php

namespace App\Ecommerce\Http\Requests\Categories;

use App\Ecommerce\Http\Requests\Categories\CreateRequest;

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
        $errorCode ['id']= 'ecommerce.fr.cat.id';
        return $errorCode;
    }
    
    public function rules()
    {        
        $rules=parent::rules();
        $rules['id']='required|integer|xss|exists:ecommerce.categories,id';
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



