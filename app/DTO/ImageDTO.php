<?php

namespace App\DTO;

use App\Enums\ImageFolderEnum;
use Illuminate\Support\Str;

class ImageDTO extends CoreDTO
{
    static function make(array $attributes) : array
    {
        return [
            'file' => $attributes['file'],
            'id' => $attributes['id'] ?? Str::uuid()->toString(),
            'folder' => ImageFolderEnum::from($attributes['folder'])->directory()
        ];
    }
}
