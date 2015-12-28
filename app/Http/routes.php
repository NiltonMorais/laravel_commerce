<?php

Route::get('/', 'StoreController@index');
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);
Route::get('cart', ['as' => 'store.cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'store.cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'store.cart.destroy', 'uses' => 'CartController@destroy']);
Route::put('cart/update/{id}', ['as' => 'store.cart.update', 'uses' => 'CartController@update']);


Route::group(['middleware'=>'auth'], function(){
    Route::get('checkout/placeorder', ['as' => 'store.checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});


Route::group(['prefix' => 'admin', 'middleware'=>'auth', 'as' => 'admin.', 'where' => ['id' => '[0-9]+']] , function(){

    Route::group(['prefix'=> 'products', 'as' => 'products.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'AdminProductsController@index']);
        Route::get('{id}/show', ['as' => 'show', 'uses' => 'AdminProductsController@show']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdminProductsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AdminProductsController@store']);
        Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('{id}/update', ['as' => 'update', 'uses' => 'AdminProductsController@update']);
        Route::get('{id}/destroy', ['as' => 'destroy', 'uses' => 'AdminProductsController@destroy']);

        Route::group(['prefix'=>'images', 'as'=>'images.'], function(){
            Route::get('{id}/product', ['as' => 'index', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}/product', ['as' => 'create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}/product', ['as' => 'store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}/image', ['as' => 'destroy', 'uses' => 'AdminProductsController@destroyImage']);
        });
    });

    Route::group(['prefix'=> 'categories', 'as' => 'categories.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('{id}/show', ['as' => 'show', 'uses' => 'AdminCategoriesController@show']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('{id}/update', ['as' => 'update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('{id}/destroy', ['as' => 'destroy', 'uses' => 'AdminCategoriesController@destroy']);
    });

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test' => 'TestController',
]);
