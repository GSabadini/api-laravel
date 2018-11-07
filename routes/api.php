<?php

Route::middleware(['jwt.auth'])->group(function () {
    Route::apiResource('/products', 'Product\ProductController');
    Route::get('/categories', 'Category\CategoryController@index');
});

Route::post('/auth', 'Auth\AuthController@authenticate');
