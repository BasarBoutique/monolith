<?php

namespace App\DTO;

class UserDetailDTO extends CoreDTO {

    static function make(array $attributes): array
    {
        $detail = array_key_exists('detail', $attributes) ? $attributes['detail'] : $attributes;

        return [
            'udetail_fullname' => $detail['fullname'] ?? $attributes['name'],
            'udetail_photo' => $detail['photo'] ?? '',
            'udetail_direction'=> $detail['direction'] ?? '',
            'udetail_movil'=> $detail['movil'] ?? ''
        ];
    }

}
