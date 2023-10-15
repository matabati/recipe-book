<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class RequestRulesException extends Exception
{
    protected $fields;
    protected $error_code;

    public function __construct($fields, $error_code)
    {
        parent::__construct();

        $this->fields = $fields;
        $this->error_code = $error_code;
        self::setCode(Response::HTTP_BAD_REQUEST);
        self::setMessage(trans('messages.custom.'.Response::HTTP_BAD_REQUEST));
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields): void
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->error_code;
    }

    /**
     * @param mixed $error_code
     */
    public function setErrorCode($error_code): void
    {
        $this->error_code = $error_code;
    }
}
