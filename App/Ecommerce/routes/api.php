<?php 

Route::group([
    'prefix'=>'v1',
    'middleware'=>'auth.basic',
    'namespace' =>'v1'
], function() {
    
});

Route::group([
    'prefix'=>'v1',
    'namespace'=>'v1',
    'middleware'=>'auth:api'
], function() {
    // require realpath(base_path() . '/routes/modules/xxxx.php');
    
    Route::group([
        'prefix'=>'branches',
    ], function() {
        require realpath(base_path() . '/routes/modules/branches.php');
    });
    
    Route::group([
        'prefix'=>'categories',
    ], function() {
        require realpath(base_path() . '/routes/modules/categories.php');
    });
    
    Route::group([
        'prefix'=>'products',
    ], function() {
        require realpath(base_path() . '/routes/modules/products.php');
    });
    
    Route::group([
        'prefix'=>'payment_arrangements',
    ], function() {
        require realpath(base_path() . '/routes/modules/payment_arrangements.php');
    });
    
    Route::group([
        'prefix'=>'payment_installments',
    ], function() {
        require realpath(base_path() . '/routes/modules/payment_installments.php');
    });
});
