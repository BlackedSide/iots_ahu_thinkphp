<?php
namespace app\index\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Index extends Controller
{
    public function index()
    {
        $list1 = db('iot_content') -> where('category',"新闻") -> order('createtime DESC') -> limit(8) -> select();
        $list2 = db('iot_content') -> where('category',"论文") -> order('createtime DESC') -> limit(8) -> select();
        $list3 = db('iot_banner') -> order('createtime DESC') -> limit(3) -> select();
        $this -> assign('latest_news',$list1);
        $this -> assign('latest_thesis',$list2);
        $this -> assign('banner_show',$list3);
        return $this->fetch();
    }

    public function shownews($id){
        $show = db('iot_content') -> where('id',$id) -> select();
        $notify = db('iot_content') -> where('category',"通知") -> order('createtime DESC') -> limit(5) -> select();
        $this -> assign('latest_notify',$notify);
        // print_r($show);
        $this -> assign('html_title',$show[0]['title']);
        $this -> assign('news_title',$show[0]['title']);
        $this -> assign('news_time',$show[0]['createtime']);
        $this -> assign('news_content',$show[0]['content']);
        return $this -> fetch('shownews');
    }
}
