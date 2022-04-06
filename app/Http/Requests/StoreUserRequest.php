<?php

namespace App\Http\Requests;

use App\Http\Requests\Core\JsonRequest;

class StoreUserRequest extends JsonRequest
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
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string',
            'detail' => 'sometimes|array'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "What's your name?",

            'email.required' => 'Enter an email address.',
            'email.unique' => 'This email address has already been taken.',

            'password.required' => 'Enter a password.',
        ];
    }
}
