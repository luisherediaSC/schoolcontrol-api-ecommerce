<?php

namespace App\Ecommerce\Http\Requests\Products;

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
        'product_status_id'=>'required|xss|integer|exists:ecommerce.products_status,id',
        'product_type_id'=>'required|xss|integer|exists:ecommerce.product_types,id',
        'name' => 'required|xss|max:75',
        'active'=>'required|xss|boolean',
        'description'=>'sometimes|xss|max:200',
        'main_period'=>'sometimes|xss|size:36',
    ];
    
    protected $sanitizes = [
        'active'=>'boolean'
    ];
    
    protected $errorCode = [
        'name'=>'ecommerce.fr.pro.name',
        'description'=>'ecommerce.fr.pro.desc',
    ];
    
}
