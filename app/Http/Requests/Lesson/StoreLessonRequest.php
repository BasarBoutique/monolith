<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
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
            'title' => ['required','string',Rule::unique(LessonDetial::class, 'ld_title')] ,
            'url' => ['required','string'],
            'description' => ['required','array'],
            'description.context' => ['required','string'],
            'description.length' => ['required','string'],
            'course_id' => ['required','numeric',Rule::exists(Courses::class,'course_id')]
        ];
    }

    public function messages()
    {
        return [
            'ld_title.required' => 'This lesson name is required',
            'ld_url.required' => 'This lesson is required',
            'description.required' => 'How lesson description is the video?',
            'description.context.required' => 'This lesson description is required',
            'description.length.required' => 'This lesson length is required',
            'course_id.required' => 'This course is required'
        ];
    }
}
