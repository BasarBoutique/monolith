<?php

namespace App\DTO;

class UserDetailDTO extends CoreDTO {

    static function make(array $attributes): array
    {
        $detail = $attributes['detail'];

        return [
            'udetail_fullname' => $detail['fullname'] ?? $attributes['name'],
            'udetail_photo' => $detail['photo'] ?? '',
            'udetail_direction'=> $detail['direction'] ?? '',
            'udetail_movil'=> $detail['movil'] ?? ''
        ];
    }

}
