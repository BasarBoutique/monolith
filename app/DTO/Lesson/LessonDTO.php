<?php

namespace App\DTO\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Lesson;

class LessonDTO implements DTOInterface{

    static function make(array $attributes) : array
    {
        return [
            'ld_title' => $attributes['ld_title'],
            'ld_url' => $attributes['ld_url'],
            'ld_description' => $attributes['ld_description'],
            'course_id' => LessonDetailDTO::make([],$attributes)
        ];
    }
    
}