<?php

namespace App\DTO;

class UserDetailDTO extends CoreDTO {

    static function make(array $attributes): array
    {
        return [
            'udetail_fullname' => $attributes['fullname'] ?? $attributes['name'],
            'udetail_photo' => $attributes['photo'] ?? '',
            'udetail_direction'=> $attributes['direction'] ?? '',
            'udetail_movil'=> $attributes['movil'] ?? ''
        ];
    }

}
