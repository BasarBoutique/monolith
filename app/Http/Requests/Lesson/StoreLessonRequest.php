<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Courses;
use App\Models\LessonDetail;
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
            'title' => ['required','string',Rule::unique(LessonDetail::class, 'ld_title')] ,
            'url' => ['required','string'],
            'course' => ['required','numeric',Rule::exists(Courses::class,'course_id')],
            'metadata' => ['required','array'],
            'metadata.about' => ['required','string'],
            'metadata.videoDuration' => ['required','string'],
            'metadata.imageUrl' => ['required','string']
        ];
    }
}
