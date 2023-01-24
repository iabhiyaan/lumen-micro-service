<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponser
{
    /*
     * Build success response
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     * */
    public function successReponse($data, $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['data' => $data], $code);
    }

    /*
    * Build error response
    * @param string|array $message
    * @param int $code
    * @return Illuminate\Http\JsonResponse
    * */
    public function errorReponse($message, $code): JsonResponse
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }
}
