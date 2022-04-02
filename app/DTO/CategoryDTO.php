<?php

namespace App\DTO;

class CategoryDTO extends CoreDTO {

    static function make(array $attributes) : array
    {
        return [
            'category_title' => $attributes['category_title'],
            'category_ico' => $attributes['category_ico'],
        ];
    }

}
