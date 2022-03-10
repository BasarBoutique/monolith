<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
use App\Models\Lesson;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeCourseRequest extends AuthorizationAdminRequest
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
            'lessonId' => ['sometimes','required', 'numeric', Rule::exists(Lesson::class, 'lesson_id')],
            'course_id' => ['sometimes','required', 'numeric', Rule::exists(Courses::class,'course_id')]
        ];
    }
}
