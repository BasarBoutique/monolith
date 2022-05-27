<?php

namespace App\DTO\User;

use App\DTO\CoreDTO;

class UserGoogleDetailDTO extends CoreDTO {

    static function make(array $attributes): array
    {
        $detail = array_key_exists('detail', $attributes) ? $attributes['detail'] : $attributes;

        return [
            'udetail_fullname' => $detail['given_name'] . ' ' . $detail['family_name'] ?? $attributes['name'],
            'udetail_photo' => $detail['picture'] ?? '',
            'udetail_direction'=> $detail['direction'] ?? '',
            'udetail_movil'=> $detail['movil'] ?? ''
        ];
    }

}
