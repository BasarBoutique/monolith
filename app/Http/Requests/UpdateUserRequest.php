<?php

namespace App\Http\Requests;

use App\Http\Requests\Core\JsonRequest;

class UpdateUserRequest extends JsonRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'detail' => 'sometimes|array',
            'detail.fullname' => 'sometimes|string',
            'detail.photo' => 'sometimes|img',
            ''
        ];
    }
}
