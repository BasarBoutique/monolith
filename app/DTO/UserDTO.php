<?php

namespace App\DTO;

class UserDTO extends CoreDTO {

    static function make(array $attributes) : array
    {
        return [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'detail' => UserDetailDTO::make($attributes['detail'] ?? [])
        ];
    }

}
