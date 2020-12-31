<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'cvr' => 'exclude_if:company,null|numeric|between:10000000,99999999',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|unique:users',
            'address' => 'required|string|max:255',
            'zip' => 'required|numeric|between:1000,9999',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ];
    }
}

/*
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'cvr' => 'exclude_if:company,null|numeric|between:10000000,99999999',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'address' => 'required|string|max:255',
            'zip' => 'required|numeric|between:1000,9999',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
*/
