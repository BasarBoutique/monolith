<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\JsonRequest;
use App\Models\LessonDetail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterLessonByIdRequest extends JsonRequest
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
            'lessonId' => ['required','numeric', Rule::exists(LessonDetail::class,'ld_id')]
        ];
    }
}
