<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Http\Requests\Core\JsonRequest;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterCategotyByIdRequest extends JsonRequest
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
            'categoryId' => ['required','numeric', Rule::exists(Category::class,'category_id')]
        ];
    }
}
