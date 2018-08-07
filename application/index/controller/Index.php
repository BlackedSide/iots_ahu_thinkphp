<?php
namespace app\index\controller;
use think\Controller;
use think\Url;
url::root('/index.php');

class Index extends Controller
{
    public function index()
    {
        $list = db('iot_content') -> where('category',"新闻") -> select();
        $this -> assign('latest_news',$list);
        return $this->fetch();
    }

    public function shownews($id){
        $show = db('iot_content') -> where('id',$id) -> select();
        // print_r($show);
        $this -> assign('html_title',$show[0]['title']);
        $this -> assign('news_title',$show[0]['title']);
        $this -> assign('news_content',$show[0]['content']);
        return $this -> fetch('shownews');
    }
}
