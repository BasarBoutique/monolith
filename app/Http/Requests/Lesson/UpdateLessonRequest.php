<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
use App\Models\LessonDetial;
use Illuminate\Validation\Rule;

class UpdateLessonRequest extends AuthorizationAdminRequest
{
    public function all($keys = null)
    {
        $data = parent::all($keys);

        $data['lessonId'] = $this->route('lessonId');

        return $data;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lessonId' => ['required','numeric', Rule::exists(LessonDetial::class, 'ld_id')],
            'title' => 
                [
                    'sometimes',
                    'required',
                    'string',
                    Rule::unique(LessonDetial::class, 'ld_title')->ignore($this->route('lessonId'),'ld_id')
                     ],
            'ld_url' => ['sometimes','required','string'],
            'description' => ['sometimes','required','array'],
            'description.context' => ['sometimes','required','string'],
            'description.length' => ['sometimes','required','string'],
            'course_id' => ['sometimes','required','numeric',Rule::exists(Courses::class,'course_id')]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This lesson name is required',
            'ld_url.required' => 'This lesson is required',
            'description.required' => 'How lesson description is the video?',
            'description.context.required' => 'This lesson description is required',
            'description.length.required' => 'This lesson length is required',
            'course_id.required' => 'This course is required'
        ];
    }
}
