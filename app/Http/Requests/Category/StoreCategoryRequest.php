<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Http\Requests\Core\JsonRequest;
use App\Models\Category;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends JsonRequest
{
    
    public function rules()
    {
        return [
            'category_title' => 'required|string|category_title|unique:category',
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
