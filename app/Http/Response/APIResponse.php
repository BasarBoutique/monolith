<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class APIResponse
{

    static function make(bool $success = true, $data = null, string $message = null, int $http_code = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'success' => $success
        ], $http_code);
    }


    static function success(mixed $data = null, string $message = null, int $http_code = 200): JsonResponse
    {
        return self::make(true, $data, $message, $http_code);
    }

    static function fail(string $message = null, int $http_code = 404): JsonResponse
    {
        return response()->json([
            'errors' => [$message],
            'success' => false
        ], $http_code);
    }
}
