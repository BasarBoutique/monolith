<?php

namespace App\DTO;

use App\DTO\Interfaces\DTOInterface;

abstract class CoreDTO implements DTOInterface
{
    static function make(array $attributes): array
    {
        return [];
    }

    static function append(array $dto, string $dtoKey, string $key, string $value)
    {
        if(!array_key_exists($dtoKey, $dto))
        {
            $dto[$dtoKey] = $value;
        } else if(is_array($dto[$dtoKey])) {
            $dto[$dtoKey][$key] = $value;
        } else {
            $dto[$key] = $value;
        }

        return $dto;
    }
}
