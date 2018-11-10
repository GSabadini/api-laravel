<?php

Route::middleware(['jwt.auth'])->prefix('backoffice')->group(function () {
    Route::apiResource('/products', 'Product\ProductController');
    Route::get('/categories', 'Category\CategoryController@index');
});

Route::post('/auth', 'Auth\AuthController@authenticate')->name('auth');
