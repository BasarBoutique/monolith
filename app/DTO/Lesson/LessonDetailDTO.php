<?php

namespace App\DTO\Lesson;

use App\DTO\CoreDTO;

class LessonDetailDTO extends CoreDTO {

    static function make(array $attributes, array $externalAttributes = []) : array
    {
        return [
            'course_id' => $attributes['course_id'] ?? $externalAttributes['course_id']
        ];
    }

}
