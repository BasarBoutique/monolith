<?php

namespace App\DTO\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\LessonDetial;
use App\Models\LessonLog;

class LessonDetailDTO implements DTOInterface{

    static function make(array $attributes, array $externalAttributes = []) : array
    {
        return [
            'course_id' => $attributes['course_id'] ?? $externalAttributes['course_id']
        ];
    }

}
