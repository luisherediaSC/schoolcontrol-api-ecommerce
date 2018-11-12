<?php

Route::get('/', 'BranchesController@paging')
    ->middleware('gate:task.ecommerce.branches.paging');
