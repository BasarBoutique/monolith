<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\PermissionHierarchy;
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
            'label' => ['required', 'string', Rule::unique(PermissionHierarchy::class, 'ph_label')],
            'permission_level' => ['required', 'numeric',Rule::unique(PermissionHierarchy::class, 'permission_level')]
        ];
    }

    public function messages()
    {
        return [
            'label.required' => 'The role name is required!',
            'label.unique'   => 'This role has already been created! ',

            'permission_level.required' => 'A level is required for the role!',
            'permission_level.unique' => 'This level has already been taken by another role! '     
        ];
    }

    public function validatePermissionEnum()
    {

    }
}