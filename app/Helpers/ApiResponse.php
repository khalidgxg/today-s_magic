<?php

/**
 * Created by PhpStorm.
 * User: Abdulrahman
 * Date: 1/17/2019
 * Time: 11:18 م
 */

use Illuminate\Http\JsonResponse;

/**
 * success response method.
 *
 * @return \Illuminate\Http\Response
 */
function sendResponse($message = 'OK', $data = null, $status_code = 200): JsonResponse
{
    $response = [
        'success' => true,
        'message' => $message,

        'data' => convertKeysToCamelCase($data),
        'statusCode' => $status_code,
    ];

    return response()->json($response, $status_code);
}

/**
 * return error response.
 *
 * @return \Illuminate\Http\Response
 */
function sendError($message = 'Error', $data = null, $status_code = 404, $errors = []): JsonResponse
{
    $response = [
        'success' => false,
        'message' => $message,
        'errors' => convertKeysToCamelCase($errors),
        'data' => convertKeysToCamelCase($data),
        'statusCode' => $status_code,
    ];

    if (in_array($status_code, [301, 403, 404])) {
        unset($response['errors']);
    }

    return response()->json($response, $status_code);
}
