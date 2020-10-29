<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\TokenCreateRequest;

class LoginController extends Controller
{
    /**
     * login
     * get a token
     * @return \Illuminate\Http\Response (JSON)
     */
    public function api_login(TokenCreateRequest $request){
        $loginData = User::create_token($request);
        return response()->json($loginData);
    }
    
    /**
     * logout
     * revoke a token
     * @return \Illuminate\Http\Response (JSON)
     */
    public function api_logout(Request $request){
        $logoutData = User::revoke_token($request);
        return response()->json($logoutData);
    }

}
