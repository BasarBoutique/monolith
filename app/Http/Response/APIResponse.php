<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class APIResponse
{

    static function make(bool $success = true, $data = null, string $message = null, int $http_code = 200): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'data' => $data,
            'message' => $message
        ], $http_code);
    }


    static function success(array|null $data = null, string $message = null, int $http_code = 200): JsonResponse
    {
        return self::make(true, $data, $message, $http_code);
    }

    static function fail(string $message = null, array|null $data = null, int $http_code = 404): JsonResponse
    {
        return self::make(false, $data, $message, $http_code);
    }

    static function crashed(string $message = null, array | int $htpp_code = 500) : JsonResponse
    {
        return self::make(false, null, $message, $htpp_code);
    }
}