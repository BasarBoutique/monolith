<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\PermissionUser;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;

class DettachRolRequest extends AuthorizationAdminRequest
{

    public function prepareForValidation()
    {
        $this->merge([
            'permission_level' => PermissionUser::where('user_id')
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $permissions_user = PermissionUser::where('user_id', $this->user)->pluck('permission_level');

        return [
            'user' => ['required', 'numeric'],
            'permission_level' => ['required', Rule::in($permissions_user)]
        ];
    }
}
