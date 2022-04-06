<?php

namespace App\Http\Requests\Core;

use App\Http\Response\APIResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthenticateRequest extends JsonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->is_enabled;
    }

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

    protected function failedAuthorization()
    {
        throw new HttpResponseException(APIResponse::fail('Not authorize to execute this action', 403));
    }
}
