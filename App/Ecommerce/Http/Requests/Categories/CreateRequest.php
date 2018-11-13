<?php

namespace App\Ecommerce\Http\Requests\Categories;

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
        'branch_id'=>'required|xss|size:36|exists:ecommerce.branches,id',
        'active'=>'required|xss|boolean',
        'name' => 'required|xss|max:75',
        'parent_id' => 'sometimes|integer',
        'description'=>'sometimes|xss|max:200',
    ];
    
    protected $sanitizes = [
        'active'=>'boolean'
    ];
    
    protected $errorCode = [
        'name'=>'ecommerce.fr.cat.name',
        'description'=>'ecommerce.fr.cat.desc',
    ];
    
}
