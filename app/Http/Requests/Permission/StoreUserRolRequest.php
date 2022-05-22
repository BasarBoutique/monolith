<?php

namespace App\Http\Requests\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Requests\Core\JsonRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreUserRolRequest extends JsonRequest
{

   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'numeric', Rule::exists('users', 'user_id')],
            'permission_level' => ['required', 'array', 'distinct'],
            'permission_level.*' => ['numeric', new Enum(PermissionRoleEnum::class)]
        ];
    }
}
