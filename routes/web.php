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
    
    Route::get('/fashions', 'fashionController@index');
    Route::get('/', 'fashionController@index')->middleware('auth');
    
    Route::get('/fashions/register', 'fashionController@register');
    
    Route::get('/fashions/{fashion}', 'fashionController@show');
    Route::post('/fashions','fashionController@store');
    
    Route::get('/fashions/{fashion}/edit', 'fashionController@edit');
    Route::put('/fashions/{fashion}', 'fashionController@update');
    Route::delete('/fashions/{fashion}', 'fashionController@delete');
    
    Route::get('/categories/{category}', 'CategoryController@index');
    
    
Route::get('/me/new', 'MeController@new')->name('me_new');
Route::post('/me/create', 'MeController@create')->name('me_create');
Route::get('/me/{me}/edit', 'MeController@edit')->name('me_edit');
Route::post('/me/{me}/update', 'MeController@update')->name('me_update');

});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

