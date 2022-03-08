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
            'ld_description.description' => ['required','string'],
            'ld_description.length' => ['required','string'],
            'lesson' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'ld_title.required' => 'This lesson name is required',
            'ld_url.required' => 'This lesson is required',
            'ld_description.required' => 'How lesson description is the video?',
            'ld_description.description' => 'This lesson description is required',
            'ld_description.length' => 'This lesson length is required'
        ];
    }
}
