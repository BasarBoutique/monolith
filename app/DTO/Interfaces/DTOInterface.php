<?php
namespace App\DTO\Interfaces;


interface DTOInterface {

    static function make(array $attributes) : array;

    static function append(array $dto, string $dtoKey, string $key, string $value);

}
