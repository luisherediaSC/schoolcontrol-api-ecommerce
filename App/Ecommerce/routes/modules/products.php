<?php

Route::get('{id}', 'ProductsController@report')
    ->middleware('gate:task.ecommerce.products.report');
Route::get('/', 'ProductsController@paging')
    ->middleware('gate:task.ecommerce.products.paging');
Route::post('/', 'ProductsController@create')
    ->middleware('gate:task.ecommerce.products.create');
Route::delete('{id}', 'ProductsController@delete')
    ->middleware('gate:task.ecommerce.products.delete');
Route::put('{id}', 'ProductsController@update')
    ->middleware('gate:task.ecommerce.products.update');
