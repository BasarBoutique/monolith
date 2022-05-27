<?php

namespace App\DTO\User;

use App\DTO\CoreDTO;

class UserGoogleDTO extends CoreDTO
{
    static function make(array $attributes) : array
    {
        return [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['sub']),
            'detail' => UserGoogleDetailDTO::make($attributes)
        ];
    }
}