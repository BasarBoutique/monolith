<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
use App\Rules\Course\IsTeacher;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends AuthorizationAdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', Rule::unique(Courses::class, 'course_title')],
            'photo-url' => ['required', 'url'],
            'detail' => ['required', 'array'],
            'detail.author' => ['required', 'numeric', new IsTeacher()],
            'detail.description' => ['nullable']
        ];
    }
}
