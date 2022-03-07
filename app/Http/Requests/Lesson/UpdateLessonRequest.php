<?php

namespace App\Http\Requests\Lesson;

use App\Http\Requests\Core\AuthorizationAdminRequest;

class UpdateLessonRequest extends AuthorizationAdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ld_title' => ['string'] ,
            'ld_url' => ['string'],
            'ld_description' => ['array'],
            'lesson' => ['string']
        ];
    }
}
