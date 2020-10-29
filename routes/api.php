<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//  Route::apiResource('fabricantes','FabricanteController',['except'=>['edit','create'] ]);

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::post('login', "LoginController@api_login");
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('logout', "LoginController@api_logout");
    });
});