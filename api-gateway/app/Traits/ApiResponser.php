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
     * @return Illuminate\Http\Response
     * */
    public function successResponse($data, $code = Response::HTTP_OK): Response
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /*
     * Build valid response
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\Response
     * */
    public function validResponse($data, $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['data' => $data], $code);
    }


    /*
    * Build error response
    * @param string|array $message
    * @param int $code
    * @return Illuminate\Http\JsonResponse
    * */
    public function errorResponse($message, $code): JsonResponse
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }

    /*
     * Build success response
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\Response
     * */
    public function errorMessage($message, $code = Response::HTTP_OK): Response
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
