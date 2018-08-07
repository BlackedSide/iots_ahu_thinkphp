<?php
namespace app\index\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Module extends Controller
{
    public function labintro(){
        $show = db('iot_module') -> where('modname',"实验室简介") -> select();
        $this -> assign('html_title',$show[0]['modname']);
        $this -> assign('mod_name',$show[0]['modname']);
        $this -> assign('mod_content',$show[0]['content']);
        return $this -> fetch();
    }
}