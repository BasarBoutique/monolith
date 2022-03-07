<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;

class StoreLessonRequest extends AuthorizationAdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ld_title' => ['required','string'] ,
            'ld_url' => ['required','string'],
            'ld_description' => ['required','array'],
            'lesson' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'ld_title.required' => 'This lesson name is required',
            'ld_url.required' => 'This lesson is required',
            'ld_description.required' => 'How lesson description is the video?',
        ];
    }
}
