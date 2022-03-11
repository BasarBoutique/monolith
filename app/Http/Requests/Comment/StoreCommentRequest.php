<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Http\Requests\Core\JsonRequest;
use App\Models\CourseUser;
use App\Models\User;
use App\Rules\Comment\IsSubscribed;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends JsonRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment_rating' => ['required','numeric'],
            'comment_description' => ['required','string'],
            'cu_id' => ['required','numeric', Rule::exists(CourseUser::class,'cu_id')]
        ];
    }
}
