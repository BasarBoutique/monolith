<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
use App\Rules\Course\IsTeacher;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends AuthorizationAdminRequest
{

    public function all($keys = null)
    {
        $data = parent::all($keys);

        $data['courseId'] = $this->route('courseId');

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
            'courseId' => ['required', 'numeric', Rule::exists(Courses::class, 'course_id')],
            'title' =>
                [
                    'sometimes',
                    'required',
                    'string',
                    Rule::unique(Courses::class, 'course_title')->ignore($this->route('courseId'), 'course_id')
                ],
            'photo-url' => ['sometimes', 'required', 'url'],
            'detail' => ['sometimes', 'required', 'array'],
            'detail.author' => ['sometimes', 'required', 'numeric', new IsTeacher],
            'detail.description' => ['sometimes', 'required']
        ];
    }
}
