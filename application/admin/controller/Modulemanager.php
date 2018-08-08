<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Modulemanager extends Controller
{
    public function index()
    {
        $list = db('iot_module') -> select();
        $this -> assign('content_table', $list);
        return $this->fetch();
    }

    public function newmodule(){
        return $this -> fetch();
    }

    public function submit(){
        $data['modname'] = request() -> get('modin_name');
        $data['content'] = request() -> get('modin_content');
        $data['createtime'] = time();
        $data['remark'] = request() -> get('modin_remark');

        $result = db('iot_module') -> insert($data);
        if($result){
            $this -> success("添加成功！", url('index'));
        }else{
            $this -> error("添加失败……", url('index'));
        }
    }

    public function update($id){
        $result = db('iot_module') -> where('id',$id) -> select();
        $this -> assign('modin_id',$result[0]['id']);
        $this -> assign('modin_name',$result[0]['modname']);
        $this -> assign('modin_content',$result[0]['content']);
        $this -> assign('modin_remark',$result[0]['remark']);
        return $this -> fetch();
    }

    public function update_sub(){
        $id = request() -> get('modin_id');
        $data['modname'] = request() -> get('modin_name');
        $data['content'] = request() -> get('modin_content');
        $data['remark'] = request() -> get('modin_remark');
        $data['createtime'] = time();

        $result = db('iot_module') -> where('id',$id) -> update($data);
        if($result){
            $this -> success("更新成功！", url('index'));
        }else{
            $this -> error("更新失败……", url('index'));
        }
    }
}
