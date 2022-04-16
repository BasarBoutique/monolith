<?php

namespace App\DTO;

class CategoryDTO extends CoreDTO {

    static function make(array $attributes) : array
    {
        return [
            'category_title' => $attributes['title'],
            'category_ico' => $attributes['image']
        ];
    }

}
