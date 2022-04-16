<?php

namespace App\Enums;

enum ImageFolderEnum : string
{
    case USER = 'user';
    case COURSE = 'course';
    case CATEGORY = 'category';

    public function directory() : string
    {
        return match($this) {
            static::USER => 'user-photos/',
            static::COURSE => 'course-photos/',
            static::CATEGORY => 'category-photos/'
        };
    }

}
