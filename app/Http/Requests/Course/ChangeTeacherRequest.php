<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
use App\Models\User;
use App\Rules\Course\IsTeacher;
use Illuminate\Validation\Rule;

class ChangeTeacherRequest extends AuthorizationAdminRequest
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
            'teacher_id' => ['required', 'numeric', new IsTeacher]
        ];
    }
}
