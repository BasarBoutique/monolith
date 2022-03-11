<?php

namespace App\DTO\Comment;

use App\DTO\Interfaces\DTOInterface;

class CommentUserDTO implements DTOInterface{

    static function make(array $attributes, array $externarlAttributes = []) : array
    {
        return [
            'cu_id' => $attributes['cu_id'] ?? $externarlAttributes['cu_id']
        ];
    }
    
}