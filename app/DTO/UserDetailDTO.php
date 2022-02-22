<?php

namespace App\DTO;

use App\DTO\Interfaces\DTOInterface;

class UserDetailDTO implements DTOInterface {

    static function make(array $attributes, array $externalAttributes = []): array
    {
        return [
            'udetail_fullname' => $attributes['fullname'] ?? $externalAttributes['name'],
            'udetail_photo' => $attributes['photo'] ?? '',
            'udetail_direction'=> $attributes['direction'] ?? '',
            'udetail_movil'=> $attributes['movil'] ?? ''
        ];
    }
}
