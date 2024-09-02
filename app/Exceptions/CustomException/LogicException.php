<?php

namespace App\Exceptions\CustomException;

use Exception;
use Throwable;

class LogicException extends Exception
{
    private ?string $errorKey;

    private $data;

    public function __construct(string $message = 'error', int $statusCode = 400, $errorKey = null, $data = null, Throwable $previous = null)
    {
        parent::__construct($message, $statusCode, $previous);
        $this->data = $data;
        $this->errorKey = $errorKey;
    }

    public function getErrorKey()
    {
        return $this->errorKey;
    }

    public function getData()
    {
        return $this->data;
    }
}
