<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 显示后台首页
 * Class IndexController
 * @package Admin\Controller
 */
class IndexController extends CommonController {
    public function index(){
        // 获取文章最大阅读量
        $news = D('News')->maxcount();
        $newscount = D('News')->getNewsCount(array('status'=>1));
        $positionCount = D('Position')->getCount(array('status'=>1));
        $adminCount = D("Admin")->getLastLoginUsers();

        $this->assign('news', $news);
        $this->assign('newscount', $newscount);
        $this->assign('positioncount', $positionCount);
        $this->assign('admincount', $adminCount);
        $this->display();
    }
}