<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DisableCourseRequest extends AuthorizationAdminRequest
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
            'courseId' =>['required','numeric', Rule::exists(Courses::class,'course_id')]
        ];
    }
}
