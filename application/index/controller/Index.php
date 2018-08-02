<?php
namespace app\index\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
