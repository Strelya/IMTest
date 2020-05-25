<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $rand_products = App\Products::orderByRaw("RAND()")->take(3)->get();

    return view('layouts.main', compact('rand_products'));
});

Route::get('/categories/{category}', 'CategoriesController@index');

Route::get('/pages', 'ProductsController@pages');

Route::get('/product/{id}', 'ProductsController@index');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/admin/create', 'CategoriesController@create');

Route::post('/admin/create', ['as' => 'category_store', 'uses' => 'CategoriesController@store']);

Route::get('/admin/{category}', 'CategoriesController@show');

Route::get('/admin/{category}/edit', 'CategoriesController@edit');

Route::patch('/admin', ['as' => 'category_update', 'uses' =>'CategoriesController@update']);

Route::delete('/admin/delete/{category}', 'CategoriesController@destroy');

Route::get('/admin_products', 'ProductsController@admin_products');

Route::get('/admin_products/create', 'ProductsController@create');

Route::get('/admin_products/{product}', 'ProductsController@admin_product');

Route::post('/admin_products/create', ['as' => 'product_store', 'uses' => 'ProductsController@store']);

Route::get('/admin_products/{product}/edit', 'ProductsController@edit');

Route::patch('/admin_products', ['as' => 'product_update', 'uses' =>'ProductsController@update']);

Route::delete('/admin_products/delete/{product}', 'ProductsController@destroy');

Route::get('/search', 'ProductsController@search');