<?php
namespace App\DTO\Interfaces;


interface DTOInterface {
    
    static function make(array $attributes) : array;
}
