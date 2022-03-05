<?php

namespace App\DTO;

use App\DTO\Interfaces\DTOInterface;

class CategoryDTO implements DTOInterface{

    static function make(array $attributes) : array
    {
        return [
            'category_title' => $attributes['category_title'],
            'category_ico' => $attributes['category_ico'],
        ];
    }
    
}