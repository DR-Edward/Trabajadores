<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Crud;

class Worker extends Model
{
    use HasFactory, Crud;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthday',
        'hiredDate',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birthday' => 'datetime:Y-m-d',
        'hiredDate' => 'datetime:Y-m-d',
        'phone' => 'string',
        'salary' => 'double',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'birthday',
        'email',
        'phone',
        'hiredDate',
        'banckAccountNumber',
        'salary',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'phone',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
        'phone_formatted',
    ];

    /**
     * Get the full name.
     *
     * @param  string  $value
     * @return string
     */
    public function getFullNameAttribute($value)
    {
        return $this->firstName." ".$this->lastName;
    }
    
    /**
     * Get the phone number formatted.
     *
     * @param  string  $value
     * @return string
     */
    public function getPhoneFormattedAttribute($value)
    {
        $phone = $this->phone;
        return "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)." ".substr($phone, 6);
    }
}
