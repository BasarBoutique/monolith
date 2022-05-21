<?php

namespace App\Http\Requests\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Requests\Core\JsonRequest;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;

class DettachRolRequest extends JsonRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'user' => User::find($this->user_id)
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
            'user' => ['required'],
            'permission_level' => ['required', 'array'],
            'permission_level.*' => ['required', 'numeric', new Enum(PermissionRoleEnum::class)]
        ];
    }
}
