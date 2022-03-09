<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends AuthorizationAdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|string',
            'category_title' => ['required','string',Rule::unique(Category::class, 'category_title')],
            'category_ico' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'category_title.required' => 'This category name is required',         
            'category_title.unique' => 'This category has already been created!',
        ];
    }
}
