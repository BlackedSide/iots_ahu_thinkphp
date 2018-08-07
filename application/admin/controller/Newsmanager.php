<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Newsmanager extends Controller
{
    public function index(){
        $list = db('iot_content') -> where('category',"新闻") -> select();
        $this -> assign('content_table', $list);
        return $this->fetch();
    }

    public function insert(){
        return $this -> fetch('insert');
    }

    public function submit(){
        $data['title'] = request() -> get('newin_title');
        $data['content'] = request() -> get('newin_content');
        $data['category'] = "新闻";
        $data['createtime'] = time();
        $data['remark'] = request() -> get('newin_remark');

        $result = db('iot_content') -> insert($data);
        if($result){
            $this -> success("添加成功！", url('index'));
        }else{
            $this -> error("添加失败……", url('index'));
        }
    }
}