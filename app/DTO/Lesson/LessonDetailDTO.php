<?php

namespace App\DTO\Lesson;

use App\DTO\Interfaces\DTOInterface;

class LessonDetailDTO implements DTOInterface{

    static function make(array $attributes, array $externarlAttributes = []) : array
    {
        return [
            'ld_title' => $attributes['ld_title'] ?? $externarlAttributes['ld_title'],
            'ld_url' => $attributes['ld_url'] ?? $externarlAttributes['ld_url'],
            'ld_description' => $attributes['ld_description'] ?? $externarlAttributes['ld_description']
        ];
    }
    
}