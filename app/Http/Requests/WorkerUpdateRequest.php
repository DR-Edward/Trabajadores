<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'birthday' => 'required|date_format:Y-m-d',
            'email' => 'required|email',
            'phone' => 'required|numeric|max:9999999999',
            'hiredDate' => 'required|date_format:Y-m-d',
            'banckAccountNumber' => 'required|string|max:31',
            'salary' => 'required|numeric|between:1,9999999.99'
        ];
    }
}
