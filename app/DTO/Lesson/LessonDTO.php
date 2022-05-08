<?php

namespace App\DTO\Lesson;

use App\DTO\CoreDTO;

class LessonDTO extends CoreDTO {

    static function make(array $attributes) : array
    {
        return [
            'course_id' => $attributes['course'],
            'detail' => LessonDetailDTO::make($attributes)
        ];
    }

}
