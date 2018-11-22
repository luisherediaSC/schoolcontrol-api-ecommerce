<?php

Route::get('{id}', 'Payment_installmentsController@report')
    ->middleware('gate:task.ecommerce.payment_installments.report');
Route::get('/', 'Payment_installmentsController@paging')
    ->middleware('gate:task.ecommerce.payment_installments.paging');
Route::post('/', 'Payment_installmentsController@create')
    ->middleware('gate:task.ecommerce.payment_installments.create');
Route::delete('{id}', 'Payment_installmentsController@delete')
    ->middleware('gate:task.ecommerce.payment_installments.delete');
Route::put('{id}', 'Payment_installmentsController@update')
    ->middleware('gate:task.ecommerce.payment_installments.update');
