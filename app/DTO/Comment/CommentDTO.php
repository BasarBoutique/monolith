<?php

namespace App\DTO\Comment;

use App\DTO\CoreDTO;

class CommentDTO extends CoreDTO {

    static function make(array $attributes) : array
    {
        return [
            'comment_rating' => $attributes['rating'],
            'comment_description' => $attributes['description']
        ];
    }

}
