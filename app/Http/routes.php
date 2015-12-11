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

Route::get('/', function () {
    return view('welcome');
});

*/
Route::get('category/{category}', function(\CodeCommerce\Category $category){
    dd($category);
    return $category->name;
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'] , function(){


    Route::group(['prefix'=> 'products', 'as' => 'products.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'AdminProductsController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'AdminProductsController@show']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdminProductsController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AdminProductsController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminProductsController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'AdminProductsController@update']);
        Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'AdminProductsController@delete']);
    });

    Route::group(['prefix'=> 'categories', 'as' => 'categories.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'AdminCategoriesController@show']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'AdminCategoriesController@delete']);
    });

});
