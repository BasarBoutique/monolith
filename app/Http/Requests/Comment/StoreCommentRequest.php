<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends AuthorizationAdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
