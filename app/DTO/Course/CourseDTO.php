<?php

namespace App\DTO\Course;

use App\DTO\Interfaces\DTOInterface;

class CourseDTO implements DTOInterface{

    static function make(array $attributes) : array
    {
        return [
            'course_title' => $attributes['title'],
            'course_photo' => $attributes['photo-url'],
            'detail' => CourseDetailDTO::make($attributes['details'])
        ];
    }

}
