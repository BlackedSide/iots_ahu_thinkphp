<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Newsmanager extends Controller
{
    public function index(){
        $list = db('iot_content') -> where('category',"新闻") -> order("createtime DESC") -> select();
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

    public function update($id){
        $result = db('iot_content') -> where('id',$id) -> select();
        $this -> assign('newin_id',$result[0]['id']);
        $this -> assign('newin_title',$result[0]['title']);
        $this -> assign('newin_content',$result[0]['content']);
        $this -> assign('newin_remark',$result[0]['remark']);
        return $this -> fetch();
    }

    public function update_sub(){
        $id = request() -> get('newin_id');
        $data['title'] = request() -> get('newin_title');
        $data['content'] = request() -> get('newin_content');
        $data['remark'] = request() -> get('newin_remark');
        $data['createtime'] = time();

        $result = db('iot_content') -> where('id',$id) -> update($data);
        if($result){
            $this -> success("更新成功！", url('index'));
        }else{
            $this -> error("更新失败……", url('index'));
        }
    }
}