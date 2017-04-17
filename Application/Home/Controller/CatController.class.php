<?php
namespace Home\Controller;
use Think\Controller;
class CatController extends CommonController {
    public function index()
    {
        // 获取栏目id(cms_news里面catid)
        $id = intval($_GET['id']);
        if(!$id) {
            return $this->error('ID不存在');
        }
        // 查询数据库,判断栏目id是否存在
        $nav = D("Menu")->find($id);
        if(!$nav || $nav['status'] !=1) {
            return $this->error('栏目id不存在或者状态不为正常');
        }

        // 文章排行
        $rankNews = $this->getRank();

        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 2;

        $conds = array(
            'status' => 1,
            'thumb' => array('neq', ''),
            'catid' => $id,
        );
        // 分页获取文章内容和文章总数
        $news = D("News")->getNews($conds,$page,$pageSize);
        $count = D("News")->getNewsCount($conds);

        // 使用分页类
        $res  =  new \Think\Page($count,$pageSize);
        $pageres = $res->show();

        $this->assign('result', array(
            'rankNews'=>$rankNews,
            'catId' => $id,
            'listNews' => $news,
            'pageres' => $pageres,
        ));
        $this->display();
    }
}