<?php

namespace App\DTO\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\LessonDetial;
use App\Models\LessonLog;

class LessonDetailDTO implements DTOInterface{

    static function make(array $attributes, array $externarlAttributes = []) : array
    {
        return [
            'course_id' => $attributes['course_id'] ?? $externarlAttributes['lesson']
        ];
    }
    
}