<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\JsonRequest;

class ShowCategoriesRequest extends JsonRequest
{

    public function prepareForValidation()
    {
        $this->merge([
            'withDisabled' => filter_var($this->withDisabled, FILTER_VALIDATE_BOOLEAN)
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
            'withDisabled' => 'required|boolean'
        ];
    }
}
