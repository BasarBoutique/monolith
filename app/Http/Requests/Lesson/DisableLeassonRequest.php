<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use Illuminate\Foundation\Http\FormRequest;

class DisableLeassonRequest extends AuthorizationAdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lesson_id' => ['required','string'] ,
        ];
    }
}
