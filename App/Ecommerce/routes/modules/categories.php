<?php

Route::get('{id}', 'CategoriesController@report')
    ->middleware('gate:task.ecommerce.categories.report');
Route::get('/', 'CategoriesController@paging')
    ->middleware('gate:task.ecommerce.categories.paging');
Route::post('/', 'CategoriesController@create')
    ->middleware('gate:task.ecommerce.categories.create');
Route::delete('{id}', 'CategoriesController@delete')
    ->middleware('gate:task.ecommerce.categories.delete');
Route::put('{id}', 'CategoriesController@update')
    ->middleware('gate:task.ecommerce.categories.update');
