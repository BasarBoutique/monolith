<?php

namespace App\DTO\Course;

use App\DTO\CoreDTO;
use App\DTO\Interfaces\DescriptionInterface;

class CourseDetailDTO extends CoreDTO implements DescriptionInterface {

    static function make(array $attributes) : array
    {
        return [
            'cdetail_author' => $attributes['author'],
            'cdetail_description' => json_encode( CourseDetailDTO::makeDescription($attributes['metadata']))
        ];
    }

    static function makeDescription(array $description)
    {
        return [
            'description' => $description['about'] ?? 'lorem ipsum',
            'price' => floatval($description['price']) ?? 10.4
        ];
    }


}
