<?php

use Illuminate\Http\Request;


Route::group(['middleware' => ['jwt.verify']], function () {
//    Route::apiResource('/products', 'Product\ProductController');
//
//    Route::post('/auth', 'Auth\AuthController@authenticate');
});

Route::apiResource('/products', 'Product\ProductController');

Route::post('/auth', 'Auth\AuthController@authenticate');

Route::get('/categories', 'Category\CategoryController@index');
