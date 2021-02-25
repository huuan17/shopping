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
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::prefix('product_categories')->group(function () {
    Route::get('/', [
        'as'=> 'product_categories.index',
        'uses'=> 'Product_categoryController@index'
    ]);
    Route::get('/create', [
        'as'=> 'product_categories.create',
        'uses'=> 'Product_categoryController@create'
    ]);
    Route::post('/store', [
        'as'=> 'product_categories.store',
        'uses'=> 'Product_categoryController@store'
    ]);
    Route::get('/edit/{id}', [
        'as'=> 'product_categories.edit',
        'uses'=> 'Product_categoryController@edit'
    ]);
    Route::get('/delete/{id}', [
        'as'=> 'product_categories.delete',
        'uses'=> 'Product_categoryController@delete'
    ]);
    Route::post('/update/{id}', [
        'as'=> 'product_categories.update',
        'uses'=> 'Product_categoryController@update'
    ]);
});

Route::prefix('menus')->group(function () {
    Route::get('/', [
        'as' => 'menus.index',
        'uses' => 'MenuController@index'
    ]);
    Route::get('/create', [
        'as'=> 'menus.create',
        'uses'=> 'MenuController@create'
    ]);
    Route::post('/store', [
        'as'=> 'menus.store',
        'uses'=> 'MenuController@store'
    ]);
});
