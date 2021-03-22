<?php

namespace Core\Exceptions;

class AccessDeniedException extends \Exception
{
    /**
     * MethodNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'Access denied!!!',
            403
        );
    }
}