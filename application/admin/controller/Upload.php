<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Upload extends Controller
{
    public function _initialize(){
        $session = new \think\Session();
        if(!$session -> get('uid')){
            $this -> error('用户未登录！', url('login/index'));
        }
    }
    
    public function index(){
        $list = db('iot_image') -> order('createtime DESC') -> select();
        $this -> assign('content_table',$list);
        return $this -> fetch();
    }

    public function upload(){
        return $this -> fetch();
    }

    public function submit(){
        $file = request() -> file('upload_image');

        if($file){
            $info = $file -> move(ROOT_PATH.'public'.DS.'uploads');
            $data['path'] = $info -> getSaveName();
            $data['label'] = request() -> post('upload_label');
            $data['createtime'] = time();

            $uploadlist = db('iot_image') -> insert($data);
            if($uploadlist){
                $this -> success('图片上传成功！', url('index'));
            }else{
                $this -> error('图片上传失败！', url('index'));
            }
        }
    }
}