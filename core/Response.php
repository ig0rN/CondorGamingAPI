<?php

namespace Core;

abstract class Response
{
    protected string $message;
    protected array $data;
    protected int $statusCode;

    /**
     * Response constructor.
     * @param string $message
     * @param array $data
     * @param int $statusCode
     */
    public function __construct(string $message = '', array $data = [], int $statusCode = 200)
    {
        $this->message      = $message;
        $this->data         = $data;
        $this->statusCode   = $statusCode;

        echo $this->getData();
    }

    abstract protected function getData(): string;
}