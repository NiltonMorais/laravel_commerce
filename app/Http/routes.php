<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*

Route::get('/', 'WelcomeController@index');
Route::get('/admin/categories', 'AdminCategoriesController@index');
Route::get('/admin/products', 'AdminProductsController@index');

Route::get('exemplo', 'WelcomeController@exemplo');

Route::get('produtos', ['as'=>'produtos', function(){
    return "Produtos";
}]);

*/
Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'where' => ['id' => '[0-9']] , function(){

    Route::group(['prefix'=> 'products', 'as' => 'products.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'AdminProductsController@index']);
        Route::get('{id}/show', ['as' => 'show', 'uses' => 'AdminProductsController@show']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdminProductsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AdminProductsController@store']);
        Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('{id}/update', ['as' => 'update', 'uses' => 'AdminProductsController@update']);
        Route::get('{id}/destroy', ['as' => 'destroy', 'uses' => 'AdminProductsController@destroy']);
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
