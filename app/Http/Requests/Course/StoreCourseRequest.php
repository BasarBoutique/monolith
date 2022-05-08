<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Core\JsonRequest;
use App\Models\Category;
use App\Models\Courses;
use App\Rules\Course\IsTeacher;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends JsonRequest
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
            'image' => ['required', 'image'],
            'category' => ['required', 'numeric', Rule::exists(Category::class, 'category_id')],
            'detail' => ['required', 'array'],
            'detail.author' => ['required', 'numeric', new IsTeacher],
            'detail.metadata' => ['sometimes', 'array'],
            'detail.metadata.about' => ['sometimes', 'string'],
            'detail.metadata.price' => ['sometimes', 'numeric']
        ];
    }
}
