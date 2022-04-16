<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Category;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends AuthorizationAdminRequest
{

    public function rules()
    {
        return [
            'title' => ['required', 'string', Rule::unique(Category::class, 'category_title')],
            'image' => ['required', 'image'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This category name is required',
            'title.unique' => 'This category has already been created!',
            'image.required' => 'This category ico is required',
        ];
    }

}
