<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\PermissionHierarchy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StoreRolRequest extends AuthorizationAdminRequest
{

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'label' => Str::upper($this->label)
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
            'label' => ['required|string',Rule::unique(PermissionHierarchy::class, 'ph_label')],
            'permission_level' => ['required|numeric',Rule::unique(PermissionHierarchy::class, 'permission_level')]
        ];
    }
}
