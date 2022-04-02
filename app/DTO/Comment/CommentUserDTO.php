<?php

namespace App\DTO\Comment;

use App\DTO\CoreDTO;

class CommentUserDTO extends CoreDTO
{

    static function make(array $attributes, array $externalAttributes = []) : array
    {
        return [
            'cu_id' => $attributes['courseUserId'] ?? $externalAttributes['cu_id'],
            'comment' => CommentDTO::make($attributes['comment'])
        ];
    }

}
