<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Login extends Controller
{
    public function index(){
        $session = new \think\Session();
        if($session->get('uid')){
            $this -> error('您已登录！', url('index/index'));
        }else{
            return $this -> fetch();
        }
    }

    public function login(){
        $username = request() -> post('login_name');
        $password = request() -> post('login_pwd');

        $user = db('iot_user') -> where('username',$username) -> find();
        if(!$user || $user['password'] != $password){
            $this -> error('用户名或密码错误！', url('index'));
        }
        if($user['locked']){
            $this -> error('用户被锁定！', url('index'));
        }

        $session = new \think\Session();
        $session -> set('uid', $user['id']);

        $this -> success('用户登录成功！离开请记得退出登录哦！', url('index/index'));
    }

    public function loginout(){
        $session = new \think\Session();
        $session -> clear();
        $this -> success('用户退出成功！', url('login/index'));
    }
}