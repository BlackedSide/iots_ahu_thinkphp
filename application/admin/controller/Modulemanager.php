<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Modulemanager extends Controller
{
    public function index()
    {
        $list = db('iot_content') -> where('category',"栏目") -> select();
        $this -> assign('content_table', $list);
        return $this->fetch();
    }
}
