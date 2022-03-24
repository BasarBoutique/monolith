<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Core\JsonRequest;
use Illuminate\Validation\Rule;

class SearchCourseRequest extends JsonRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'order' => [
                'order_by' => $this->order['order_by'] ?? 'created',
                'sort_by' => $this->order['sort_by'] ?? 'desc'
            ],
            'paginate' => $this->paginate ?? 20
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
            'filters' => 'sometimes|array',
            'filters.title' => 'sometimes',
            'filters.categories' => 'sometimes|array',
            'filters.categories.*' => 'sometimes|numeric|distinct',
            'filters.authors' => 'sometimes|array',
            'filters.authors.*' => 'sometimes|numeric|distinct',
            'order' => 'sometimes|array',
            'order.sort_by' => ['sometimes', Rule::in(['desc', 'asc'])],
            'order.order_by' => ['sometimes', Rule::in(['category', 'author', 'title', 'created'])],
            'paginate' => ['required', 'numeric'],
        ];
    }
}
