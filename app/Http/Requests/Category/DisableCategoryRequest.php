<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DisableCategoryRequest extends AuthorizationAdminRequest
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
            'categoryId' => ['required','numeric']
        ];
    }
}
