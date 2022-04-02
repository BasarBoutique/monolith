<?php

namespace App\DTO;

class UserDTO extends CoreDTO {

    static function make(array $attributes) : array
    {
        return [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'details' => UserDetailDTO::make($attributes['details'] ?? [], $attributes)
        ];
    }

}
