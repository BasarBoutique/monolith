<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;

class UpdateLessonRequest extends AuthorizationAdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ld_id' => ['required','string'],
            'ld_title' => ['required','string'] ,
            'ld_url' => ['required','string'],
            'ld_description' => ['required','array'],
            'lesson' => ['required','string']
        ];
    }
}
