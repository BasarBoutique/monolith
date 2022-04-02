<?php

namespace App\DTO\Course;

use App\DTO\CoreDTO;
use App\DTO\Interfaces\DTOInterface;

class CourseDTO extends CoreDTO {

    static function make(array $attributes) : array
    {
        return [
            'course_title' => $attributes['title'],
            'course_photo' => $attributes['photo-url'],
            'category' =>
                [
                    'category_id' => $attributes['category']
                ],
            'detail' => CourseDetailDTO::make($attributes['detail'] ?? [])
        ];
    }



}
