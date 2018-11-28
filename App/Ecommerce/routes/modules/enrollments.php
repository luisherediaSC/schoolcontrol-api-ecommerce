<?php

Route::get('{id}', 'EnrolmentsController@report')
    ->middleware('gate:task.ecommerce.enrollments.report');
Route::get('/', 'EnrolmentsController@paging')
    ->middleware('gate:task.ecommerce.enrollments.paging');
Route::post('/', 'EnrolmentsController@create')
    ->middleware('gate:task.ecommerce.enrollments.create');
Route::delete('{id}', 'EnrolmentsController@delete')
    ->middleware('gate:task.ecommerce.enrollments.delete');
Route::put('{id}', 'EnrolmentsController@update')
    ->middleware('gate:task.ecommerce.enrollments.update');
