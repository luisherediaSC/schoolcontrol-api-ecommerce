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
});
