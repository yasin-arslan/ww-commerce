<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;

class ResponseHandler
{
    /**
     * @return JsonResponse
     */
    public static function tooManyRequests(): JsonResponse
    {
        return self::result(429, $message ?? __('words.tooManyRequests'), $parameters);
    }

    /**
     * @param array $parameters
     * @param null $message
     * @return JsonResponse
     */
    public static function store(array $parameters = [], $message = null): JsonResponse
    {
        return self::result(200, $message ?? __(''), $parameters);
    }

    /**
     * @param array $parameters
     * @param null $message
     * @return JsonResponse
     */
    public static function update(array $parameters = [], $message = null): JsonResponse
    {
        return self::result(200, $message ?? __(''), $parameters);
    }

    /**
     * @param array $parameters
     * @param null $message
     * @return JsonResponse
     */
    public static function destroy(array $parameters = [], $message = null): JsonResponse
    {
        return self::result(200, $message ?? __(''), $parameters);
    }

    /**
     * @param array $parameters
     * @param null $message
     * @return JsonResponse
     */
    public static function restore(array $parameters = [], $message = null): JsonResponse
    {
        return self::result(200, $message ?? __(''), $parameters);
    }

    /**
     * @param array $parameters
     * @param null $message
     * @return JsonResponse
     */
    public static function success(array $parameters = [], $message = null):JsonResponse
    {
        return self::result(200, $message ?? __(''), $parameters);
    }

    /**
     * @param array $parameters
     * @return JsonResponse
     */
    public static function successWithoutMessage(array $parameters = []): JsonResponse
    {
        return self::result(200, null, $parameters);
    }

    /**
     * @param array $parameters
     * @param null $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function error(int $statusCode = 422, $message = null, array $parameters = []): JsonResponse
    {
        return self::result($statusCode, $message ?? __(''), $parameters);
    }

    /**
     * @param null $message
     * @param array $parameters
     * @return JsonResponse
     */
    public static function notFound($message = null, array $parameters = []): JsonResponse
    {
        return self::result(404, $message ??  __('words.notFound'), $parameters);
    }

    /**
     * @param array $parameters
     * @return JsonResponse
     */
    public static function notAuthorized(array $parameters = []): JsonResponse
    {
        return self::result(401, __(''), $parameters);
    }

    /**
     * @param int $statusCode
     * @param $message
     * @param null $data
     * @return JsonResponse
     */
    public static function result($statusCode = 200, $message, $data = null): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ])->setStatusCode($statusCode);
    }
}
