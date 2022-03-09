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
            'category_title' => ['required', 'string', Rule::unique(Category::class, 'category_title')],
            'category_ico' => ['required','string'],
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
