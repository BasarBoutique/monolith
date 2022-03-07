<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\User;
use App\Rules\Permission\UniqueUserRol;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRolRequest extends AuthorizationAdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['numeric', Rule::exists(User::class, 'user_id')],
            'permission_level' => ['numeric', new UniqueUserRol(request()->get('user_id'))]
        ];
    }
}
