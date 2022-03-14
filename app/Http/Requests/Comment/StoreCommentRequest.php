<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\Core\JsonRequest;
use App\Models\CourseUser;
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
            'courseUserId' => ['required','numeric', Rule::exists(CourseUser::class,'cu_id')],
            'rating' => ['required','numeric'],
            'description' => ['required','string']
        ];
    }
}
