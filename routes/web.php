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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index');
Route::get('categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/edit/{id}', 'CategoryController@edit');
Route::patch('/categories/{id}', 'CategoryController@update');
Route::get('/categories/delete/{id}', 'CategoryController@destroy');

Route::get('/users', 'user_typeController@index');
Route::delete('/users/{id}', 'user_typeController@destroy');

Route::get('/features', 'FeatureController@index');
Route::get('features/create', 'FeatureController@create');
Route::post('/features', 'FeatureController@store');
Route::get('/features/edit/{id}', 'FeatureController@edit');
Route::patch('/features/{id}', 'FeatureController@update');
Route::get('/products/show/{id}', 'FeatureController@show');
Route::delete('/features/{id}', 'FeatureController@destroy');

Route::get('auth/create', 'RegisterController@showRegistrationForm');

Route::get('/products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
Route::post('/products', 'ProductController@store');
Route::get('/products/edit/{id}', 'ProductController@edit');
Route::get('/products/show/{id}', 'ProductController@show');
Route::patch('/products/{id}', 'ProductController@update');
Route::delete('/products/{id}', 'ProductController@destroy');
Route::get('/addtocart/{id}', 'ProductController@addtocart');
Route::get('/viewcart', 'OrderController@viewcart');

Route::delete('/removefromcart/{id}', 'OrderitemController@removefromcart');
Route::post('/cart/{id}', 'OrderController@storecart');
Route::get('/quantity{id}', 'OrderitemController@quantity');

Route::get('/productfeatures', 'ProductfeatureController@index');
Route::get('productfeatures/create', 'ProductfeatureController@create');
Route::post('/productfeatures', 'ProductfeatureController@store');
Route::get('/productfeatures/edit/{id}', 'ProductfeatureController@edit');
Route::get('/productfeatures/show/{id}', 'ProductfeatureController@show');
Route::patch('/productfeatures/{id}', 'ProductfeatureController@update');
Route::delete('/productfeatures/{id}', 'ProductfeatureController@destroy');

Route::get('/productsBuyer', 'ProductController@buyer');

Route::post('/placeorder/{id}', 'OrderController@placeorder');
Route::get('/orders', 'OrderController@index');
Route::post('/complete/{id}', 'OrderController@finish');
Route::get('/vieworder/{id}', 'OrderController@show');
Route::get('/ordersbuyer', 'OrderController@indexbuyer');
Route::delete('/cancelorder/{id}', 'OrderController@destroy');


Route::get('/products/myJson', 'ProductController@myJson');
Route::get('/addProductJson', 'ProductController@addProductJson');
