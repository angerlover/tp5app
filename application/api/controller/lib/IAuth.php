<?php
namespace app\api\controller\lib;
use app\common\lib\Aes;

class IAuth
{

    /**
     * 校验Header专用方法(返回布尔)
     */
    public static function checkSign($header)
    {
        // 解密
        $sign = (new Aes())->decrypt($header['sign']);
        if(empty($sign))
        {
            return false;
        }
        // 解析
        parse_str($sign,$arr);
        // 验证是不是瞎鸡巴加密的
        if($header['did'] != $arr['did'])
        {
            return false;
        }


        return true;

    }
}