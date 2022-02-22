<?php

namespace App\DTO;

use App\DTO\Interfaces\DTOInterface;

class UserDTO implements DTOInterface {

    static function make(array $attributes) : array
    {
        return [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'details' => UserDetailDTO::make($attributes['details'], $attributes)
        ];
    }
}
