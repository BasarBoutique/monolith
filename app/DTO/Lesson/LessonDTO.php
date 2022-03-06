<?php

namespace App\DTO\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Lesson;

class LessonDTO implements DTOInterface{

    static function make(array $attributes) : array
    {
        return [
            'course_id' => $attributes['course_id'],
            'details' => LessonDetailDTO::make($attributes['details'] ?? [], $attributes)
        ];
    }
    
}