<?php

namespace Core\Responses;

use Core\Response;

class JsonResponse extends Response
{
    final protected function getData(): string
    {
        http_response_code($this->statusCode);
        header('Content-Type: application/json');

        return json_encode([
            'message' => $this->message,
            'data' => $this->data,
            'status_code' => $this->statusCode
        ]);
    }
}