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

    public function update($id){
        $result = db('iot_banner') -> where('id',$id) -> select();
        $this -> assign('newin_id',$result[0]['id']);
        $this -> assign('banner_path',$result[0]['path']);
        $this -> assign('banner_title',$result[0]['title']);
        $this -> assign('banner_news',$result[0]['news']);
        $this -> assign('banner_remark',$result[0]['remark']);
        return $this -> fetch();
    }

    public function update_sub(){
        $id = request() -> get('newin_id');
        $data['path'] = request() -> get('banner_path');
        $data['title'] = request() -> get('banner_title');
        $data['news'] = request() -> get('banner_news');
        $data['createtime'] = time();
        $data['remark'] = request() -> get('banner_remark');

        $result = db('iot_banner') -> where('id',$id) -> update($data);
        if($result){
            $this -> success('更新大图页成功！', url('index'));
        }else{
            $this -> error('更新大图页失败！', url('index'));
        }
    }

    public function deletelist($id){
        $data['locked'] = 1;
        $data['createtime'] = time();

        $result = db('iot_banner') -> where('id',$id) -> update($data);
        if($result){
            $this -> success('锁定成功！', url('index'));
        }else{
            $this -> error('锁定失败……', url('index'));
        }
    }

    public function reuse($id){
        $data['locked'] = 0;
        $data['createtime'] = time();

        $result = db('iot_banner') -> where('id',$id) -> update($data);
        if($result){
            $this -> success('恢复成功！', url('index'));
        }else{
            $this -> error('恢复失败……', url('index'));
        }
    }
}