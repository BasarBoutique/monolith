<?php

namespace App\Http\Requests\Core;

use App\Http\Response\APIResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthorizationAdminRequest extends JsonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(APIResponse::fail('Unauthorized', null, 403));
    }
}
