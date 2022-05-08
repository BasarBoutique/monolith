<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Core\JsonRequest;
use App\Models\Courses;
use App\Models\User;
use App\Rules\Course\UniqueCourseUser;
use Illuminate\Validation\Rule;

class AttachUserCourseRequest extends JsonRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', Rule::exists(User::class, 'user_id')],
            'course_id' => ['required', Rule::exists(Courses::class, 'course_id'), new UniqueCourseUser(request()->get('user_id'))]
        ];
    }
}
