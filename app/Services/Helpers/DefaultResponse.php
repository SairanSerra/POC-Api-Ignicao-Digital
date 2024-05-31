<?php

namespace App\Services\Helpers;

class DefaultResponse
{

    public function isSuccess(string $message, int $statusCode)
    {

        $body = [
            'statusCode' => $statusCode,
            'message' => $message,
        ];

        return response()->json($body, $statusCode);
    }
    public function isSuccessWithContent(string $message, int $statusCode, $content)
    {

        $body = [
            'statusCode' => $statusCode,
            'message' => $message,
            'content' => $content
        ];

        return response()->json($body, $statusCode);
    }
}
