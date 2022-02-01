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
Route::group(['middleware' => 'auth'], function(){

    
    Route::get('/fashions/{user}', 'fashionController@index');
    Route::get('/', 'fashionController@index')->middleware('auth');
    
    Route::get('/fashions/register', 'fashionController@register');

    
    Route::get('/fashions/{fashion}', 'fashionController@show');
    Route::post('/fashions','fashionController@store');
    
    Route::get('/fashions/{fashion}/edit', 'fashionController@edit');
    Route::put('/fashions/{fashion}', 'fashionController@update');
    Route::delete('/fashions/{fashion}', 'fashionController@delete');
    
    Route::get('/categories/{category}', 'CategoryController@index');
    
    

});

Route::get('/user', 'UserController@index');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

