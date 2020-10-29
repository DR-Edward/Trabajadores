<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
//  Route::resource('fabricantes','FabricanteController',['except'=>['edit','create'] ]);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [LoginController::class, "api_login"]);
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('logout', [LoginController::class, "api_logout"]);
    });
});