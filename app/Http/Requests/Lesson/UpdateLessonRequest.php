<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;
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
            'lessonId' => ['required','numeric'],
            'ld_title' => 
                [
                    'sometimes',
                    'required',
                    'string',
                     ],
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
