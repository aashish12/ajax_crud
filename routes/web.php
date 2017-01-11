<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('products/search/clothing','productController@getClothingCategory')->name('getClothing');

Route::get('products/add','productController@create')->name('viewProductForm');
Route::post('products/save','productController@store')->name('saveProduct');

Route::any('products/edit/{id}','productController@edit')->name('editProduct');
Route::post('products/update/{id}','productController@update')->name('updateProduct');
Route::any('products/view/{id}','productController@show')->name('viewProduct');
Route::any('products/delete/{id}','productController@destroy')->name('deleteProduct');
//Route::get('products/edit/{id}', function ($id) {
//    return 'Product edit'.$id;
//});


Route::any('/', 'homeController@showHome');
Route::any('products','productController@index')->name('addProduct');


// this is the route for crud operation in ajax jquery
    Route::get('category', 'CategoryController@index')->name('category');
    Route::post('category', 'CategoryController@add');
    Route::get('category/view', 'CategoryController@view');
    Route::post('category/update', 'CategoryController@update');
    Route::post('category/delete', 'CategoryController@delete');

//added event calendar
Route::get('events', 'EventController@showEvent')->name('events');

Route::get('ajaxImageUpload', ['uses'=>'AjaxImageUploadController@ajaxImageUpload']);
Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'AjaxImageUploadController@ajaxImageUploadPost']);
