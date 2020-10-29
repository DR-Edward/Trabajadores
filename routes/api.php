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

Route::group([
    'prefix' => 'auth', 
    'namespace' => 'App\Http\Controllers\Auth'
], function () {
    Route::post('login', "LoginController@api_login");
  
    Route::group([
        'middleware' => 'auth:api',
    ], function() {
        Route::post('logout', "LoginController@api_logout");
    });
});

Route::group([
    'middleware' => 'auth:api',
    'namespace' => 'App\Http\Controllers'
], function() {
    // ROUTES -> Workers
    Route::apiResource('/workers', 'WorkerController');
});