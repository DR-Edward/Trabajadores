<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get token
     * @param  string  $email
     * @param  string  $password
     * @return array
    */
    public static function create_token($email, $password) {
        if(!\Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'message_type' => 'error',
                'message_text' => 'Incorrect user or password',
            ], 401);
        }

        $user = \Auth::user();
        $credentials = $user->createToken('Access from API client');

        return [
            'user' => $user,
            'credentials' => $credentials
        ];
    }

    /**
     * Revoke Token
     * @param  string  $tokeb
     * @return array
    */
    public static function revoke_token($token) {
        $token->revoke();
        
        return [
            'message_type' => 'success',
            'message_text' => 'See you later',
        ];
    }
}
