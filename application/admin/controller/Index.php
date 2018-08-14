<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Index extends Controller
{
    public function _initialize(){
        $session = new \think\Session();
        if(!$session -> get('uid')){
            $this -> error('用户未登录！', url('login/index'));
        }
    }
    
    public function index()
    {
        return $this->fetch();
    }
}
