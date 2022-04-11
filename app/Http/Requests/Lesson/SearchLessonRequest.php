<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\JsonRequest;
use Illuminate\Foundation\Http\FormRequest;

class SearchLessonRequest extends JsonRequest
{


    protected function prepareForValidation()
    {
        $this->merge([
            'filters' => [
                'withDisabled' => false
            ],
            'paginate' => 10
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filters' => 'required|array',
            'filters.withDisabled' => 'sometimes|boolean',
            'filters.courses' => 'sometimes|array',
            'filters.courses.*' => 'numeric',
            'filters.title' => 'sometimes|string',
            'order' => 'required|array',
            'order.sort_by' => 'sometimes|string',
            'paginate' => 'numeric'
        ];
    }
}
