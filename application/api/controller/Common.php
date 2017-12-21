<?php

namespace app\api\controller;

use app\api\controller\lib\IAuth;
use think\Controller;
use think\Request;

/**
 * 公共控制器
 */
class Common extends Controller
{

    public $headers = '';
    protected function _initialize()
    {
        if(!$this->checkAuth())
        {
            throw new ApiException('权限不对！',400,-1);
        }
    }

    /**
     * 校验请求的合法性
     */
    public function checkAuth()
    {
        $headers = request()->header();
        // 检查有无sign
        if(empty($headers['sign']) || IAuth::checkSign($headers))
        {
            throw new ApiException('sing校验失败!','401',-1);
        }

//        halt(request()->header());
    }
}
