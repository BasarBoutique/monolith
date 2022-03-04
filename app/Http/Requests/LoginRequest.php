<?php

namespace App\Http\Requests;

use App\Http\Requests\Core\JsonRequest;

class LoginRequest extends JsonRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "You have not entered an email.",

            'password.required' => 'Enter your password.'
        ];
    }
}
