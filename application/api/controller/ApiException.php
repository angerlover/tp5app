<?php

namespace app\api\controller;

use think\Exception;
use think\Request;

class ApiException extends Exception
{
    public $message = '';
    public $code = 0;  // 业务状态码
    public $httpCode = 0;

    function __construct($msg,$httpCode,$code=0)
    {
        $this->httpCode = $httpCode;
        $this->code = $code;
        $this->message = $msg;
    }
}
