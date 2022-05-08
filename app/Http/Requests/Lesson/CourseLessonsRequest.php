<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\JsonRequest;
use App\Models\Courses;
use App\Rules\Lesson\UserHaveCourse;
use Illuminate\Validation\Rule;

class CourseLessonsRequest extends JsonRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course' => ['required', 'numeric', Rule::exists(Courses::class, 'course_id'), new UserHaveCourse]
        ];
    }
}
