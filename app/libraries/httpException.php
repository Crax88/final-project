<?php

class httpException extends Exception 
{
    protected $httpMessages = [
    404 => 'Not Found',
    403 => 'Access denied',
    500 => 'Internal Server Error',
    ];
    public function __construct(int $code = 0, string $msg = '') {
        parent::__construct($msg, $code);
    }
    public function sendHttpState() {
        header('HTTP/1.1' . ' ' . $this->getCode() . ' ' . $this->httpMessages[$this->getCode()]);
    }
}