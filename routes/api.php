<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

<<<<<<< HEAD
=======

>>>>>>> 2371c5800bbdf47f38fb89dc2506024bac142430

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});