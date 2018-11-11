<?php

Route::middleware(['jwt.auth'])->prefix('backoffice')->group(function () {
    Route::post('/products/upload-csv', 'Product\ProductController@uploadCsv');
    Route::get('/products/read-csv', 'Product\ProductController@readCsv');
    Route::apiResource('/products', 'Product\ProductController');
    Route::get('/categories', 'Category\CategoryController@index');
});

Route::post('/auth', 'Auth\AuthController@authenticate')->name('auth');
