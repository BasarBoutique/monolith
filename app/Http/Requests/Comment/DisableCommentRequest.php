<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DisableCommentRequest extends AuthorizationAdminRequest
{
    public function all($keys = null)
    {
        $data = parent::all($keys);

        $data['commentId'] = $this->route('commentId');

        return $data;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'commentId' => ['required','numeric', Rule::exists(Comment::class,'comment_id')]
        ];
    }
}
