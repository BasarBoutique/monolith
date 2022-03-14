<?php

namespace App\DTO\Comment;

use App\DTO\Interfaces\DTOInterface;

class CommentDTO implements DTOInterface{

    static function make(array $attributes) : array
    {
        return [
            'comment_rating' => $attributes['rating'],
            'comment_description' => $attributes['description']
        ];
    }

}
