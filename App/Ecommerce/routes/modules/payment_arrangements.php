<?php

Route::get('{id}', 'Payment_arrangementsController@report')
    ->middleware('gate:task.ecommerce.payment_arrangements.report');
Route::get('/', 'Payment_arrangementsController@paging')
    ->middleware('gate:task.ecommerce.payment_arrangements.paging');
Route::post('/', 'Payment_arrangementsController@create')
    ->middleware('gate:task.ecommerce.payment_arrangements.create');
Route::delete('{id}', 'Payment_arrangementsController@delete')
    ->middleware('gate:task.ecommerce.payment_arrangements.delete');
Route::put('{id}', 'Payment_arrangementsController@update')
    ->middleware('gate:task.ecommerce.payment_arrangements.update');
