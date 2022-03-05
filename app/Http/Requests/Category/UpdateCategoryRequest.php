<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use Illuminate\Foundation\Http\FormRequest;

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
            'category_title' => 'required|string',
            'category_ico' => 'required|string',
        ];
    }
}
