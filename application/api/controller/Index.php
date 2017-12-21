<?php
namespace app\api\controller;

use app\api\controller\ApiException;

class Index extends Common
{
    public function index()
    {
        return 1;
    }

    public function update($id)
    {
    	halt(input());
    }

    public function read($id)
    {
    	return $id;
    }

    public function save()
    {
    	 return show(0,'ok',input('post.'),201);
    }
}
