<?php

namespace App\DTO\Lesson;

use App\DTO\CoreDTO;
use App\DTO\Interfaces\DescriptionInterface;

class LessonDetailDTO extends CoreDTO implements DescriptionInterface {

    static function make(array $attributes, array $externalAttributes = []) : array
    {
        return [
            'ld_title' => $attributes['title'],
            'ld_url' => $attributes['url'],
            'ld_description' => json_encode(LessonDetailDTO::makeDescription($attributes['metadata'])),
        ];
    }

    static function makeDescription(array $description)
    {
        return [
            'about' => $description['about'] ?? 'Lorem ipsum lorem ipsum',
            'videoDuration' => $description['videoDuration'] ?? '10 min.',
            'imageUrl' => $description['imageUrl'] ?? ''
        ];
    }

}
