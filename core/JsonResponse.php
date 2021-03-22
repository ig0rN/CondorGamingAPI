<?php

namespace Core;

class JsonResponse
{
    public function __construct(string $message, array $data, int $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');

        echo json_encode([
            'message'       => $message,
            'data'          => $data,
            'status_code'   => $statusCode
        ]);
    }
}