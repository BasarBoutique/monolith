<?php

namespace App\DTO\Comment;

use App\DTO\Interfaces\DTOInterface;

class CommentDTO implements DTOInterface{

    static function make(array $attributes) : array
    {
        return [
            'comment_rating' => $attributes['comment_rating'],
            'comment_description' => $attributes['comment_description'],
            'course_id' =>$attributes['course_id'],
            'cu_id' => $attributes['cu_id']
        ];
    }
    
}