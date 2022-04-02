<?php

namespace App\DTO\Course;

use App\DTO\CoreDTO;
use App\DTO\Interfaces\DTOInterface;

class CourseDetailDTO extends CoreDTO  {

    static function make(array $attributes) : array
    {
        return [
            'cdetail_author' => $attributes['author'],
            'cdetail_description' => $attributes['description'] ?? '{}'
        ];
    }

}
