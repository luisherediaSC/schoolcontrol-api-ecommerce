<?php

namespace App\Ecommerce\Http\Requests\Enrollments;

use App\Ecommerce\Http\Requests\Enrollments\CreateRequest;

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
        $errorCode ['id']= 'ecommerce.fr.enr.id';
        return $errorCode;
    }
    
    public function rules()
    {        
        $rules=parent::rules();
        $rules['id']='required|xss|integer|exists:ecommerce.enrollments,id';
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



