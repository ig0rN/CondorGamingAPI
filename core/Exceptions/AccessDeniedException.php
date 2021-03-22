<?php

namespace Core\Exceptions;

class AccessDeniedException extends \Exception
{
    public function __construct()
    {
        parent::__construct(
            'Access denied!!!',
            403
        );
    }
}