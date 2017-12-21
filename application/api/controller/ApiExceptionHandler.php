<?php

namespace app\api\controller;

use Exception;
use think\exception\Handle;

class ApiExceptionHandler extends Handle
{
    public $httpCode = 500;

    /**
     * 重写渲染模式：如果是ApiException那就返回json的错误信息。
     */
    public function render(Exception $e)
    {
        // 调试模式的时候用自带的渲染模式
        if(config('app_debug'))
        {
            return parent::render($e);
        }
        if($e instanceof ApiException)
        {
            $this->httpCode = $e->httpCode;
        }
        return show('-1',$e->getMessage(),[],$this->httpCode);
    }
}
