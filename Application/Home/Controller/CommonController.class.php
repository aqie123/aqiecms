<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller
{
    public function __construct() {
        header("Content-type: text/html; charset=utf-8");
        parent::__construct();

        // 获取网站基本配置信息
        $result = D("Basic")->select();
        $this->assign('config', $result);
        // 获取前端导航
        $navs = D("Menu")->getBarMenus();
        $this->assign('navs',$navs);
    }

    /**
     * 获取文章排行
     * @return mixed
     */
    public function getRank()
    {
        $conds['status'] = 1;
        $news = D("News")->getRank($conds,10);
        return $news;
    }

    /**
     * 显示错误
     * @param string $message
     */
    public function error($message = '') {
        $message = $message ? $message : '系统发生错误';
        $this->assign('message',$message);
        $this->display("Index/error");
    }



}