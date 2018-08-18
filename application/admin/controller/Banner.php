<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Banner extends Controller
{
    public function _initialize(){
        $session = new \think\Session();
        if(!$session -> get('uid')){
            $this -> error('用户未登录！', url('login/index'));
        }
    }

    public function index(){
        $list = db('iot_banner') -> order('createtime DESC') -> select();
        $this -> assign('content_table',$list);
        return $this -> fetch();
    }

    public function insert(){
        return $this -> fetch();
    }

    public function submit(){
        $data['path'] = request() -> get('banner_path');
        $data['title'] = request() -> get('banner_title');
        $data['news'] = request() -> get('banner_news');
        $data['createtime'] = time();
        $data['remark'] = request() -> get('banner_remark');

        $result = db('iot_banner') -> insert($data);
        if($result){
            $this -> success('新增大图页成功！', url('index'));
        }else{
            $this -> error('新增大图页失败！', url('index'));
        }
    }
}