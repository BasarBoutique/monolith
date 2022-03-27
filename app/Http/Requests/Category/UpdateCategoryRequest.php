<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends AuthorizationAdminRequest
{
    public function all($keys = null)
    {
        $data = parent::all($keys);

        $data['categoryId'] = $this->route('categoryId');

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
            'categoryId' => ['required','numeric', Rule::exists(Category::class,'category_id')],
            'category_title' => ['sometimes','required','string',Rule::unique(Category::class, 'category_title')->ignore($this->route('categoryId'),'category_id')],
            'category_ico' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'category_title.required' => 'This category name is required',         
            'category_title.unique' => 'This category has already been created!',
            'category_ico.required' => 'This category ico is required',
        ];
    }
}
