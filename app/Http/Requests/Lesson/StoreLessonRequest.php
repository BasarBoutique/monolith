<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\LessonDetial;
use Illuminate\Validation\Rule;

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
            'ld_title' => ['required','string',Rule::unique(LessonDetial::class, 'ld_title')] ,
            'ld_url' => ['required','string'],
            'ld_description' => ['required','array'],
            'ld_description.description' => ['required','string'],
            'ld_description.length' => ['required','string'],
            'course_id' => ['required','numeric']
        ];
    }

    public function messages()
    {
        return [
            'ld_title.required' => 'This lesson name is required',
            'ld_url.required' => 'This lesson is required',
            'ld_description.required' => 'How lesson description is the video?',
            'ld_description.description' => 'This lesson description is required',
            'ld_description.length' => 'This lesson length is required',
            'course_id' => 'This course is required'
        ];
    }
}
