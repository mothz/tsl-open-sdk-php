<?php

namespace com\tsl3060\open\sdk\exception;

class ExecuteException extends \Exception
{
    private string $result;

    public function __construct($result, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->result = $result;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult(string $result): void
    {
        $this->result = $result;
    }


}