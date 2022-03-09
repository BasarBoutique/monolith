<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\User;
use App\Rules\Permission\UniqueUserRol;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRolRequest extends AuthorizationAdminRequest
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
            'permission_level' => ['numeric', new UniqueUserRol($this->request->get('user_id'))]
        ];
    }
}
