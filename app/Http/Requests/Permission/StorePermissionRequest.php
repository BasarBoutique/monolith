<?php

namespace App\Http\Requests\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\PermissionHierarchy;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StorePermissionRequest extends AuthorizationAdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rol' => [new Enum(PermissionRoleEnum::class), Rule::exists(PermissionHierarchy::class, 'permission_level')],
            'label' => 'unique:App\Models\PermissionDetail,pd_label',
            'description' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'rol.required' => 'Please designate a role.',

            'label.required' => 'Assign your name to this permission.',
            'label.unique' => 'This name has already been assigned to another permission.',
            
            'description.required' => 'Give us the details of this permission.',
        ];
    }
}
