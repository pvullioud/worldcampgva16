<?php
namespace Wpgva;

class ExceptionHandler
{
    public function __construct()
    {
        set_exception_handler(array($this, 'exception'));
    }

    public function exception(Exception $exception)
    {
        $response = array(
            'error'  => 1,
            'code'  => $exception->getCode(),
            'message' => $exception->getMessage()
        );

        if (function_exists('http_response_code'))
        {
            http_response_code($exception->getCode());
        }
        echo json_encode($response);
        die();
    }
}