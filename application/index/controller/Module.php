<?php
namespace app\index\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Module extends Controller
{
    public function index($modname){
        $notify = db('iot_content') -> where('category',"通知") -> where('locked',0) -> order('createtime DESC') -> limit(5) -> select();
        $this -> assign('latest_notify',$notify);
        $show = db('iot_module') -> where('modname',$modname) -> where('locked',0) -> select();
        $this -> assign('html_title',$show[0]['modname']);
        $this -> assign('mod_name',$show[0]['modname']);
        $this -> assign('mod_content',$show[0]['content']);
        return $this -> fetch();
    }

    public function showlist($modname,$category){
        $show = db('iot_content') -> where('category',$category) -> where('locked',0) -> order('createtime DESC') -> select();
        $this -> assign('html_title',$modname);
        $this -> assign('list_title',$modname);
        $this -> assign('list',$show);
        return $this -> fetch();
    }
}