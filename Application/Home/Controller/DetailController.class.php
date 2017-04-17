<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController
{
    public function index()
    {
        // 对id取整 文章id（cms_news里面news_id）
        $id = intval($_GET['id']);

        // 判断传递过来文章id是否存在
        if(!$id || $id<0 && is_numeric($id)) {
            return $this->error("ID不合法");
        }

        // 获取主表内容
        $news =  D("News")->find($id);
        if(!$news || $news['status'] != 1) {
            return $this->error("ID不存在或者资讯被关闭");
        }
        $ip = $_SERVER["REMOTE_ADDR"];
//        echo $ip ;exit;
        // 每次调用这个方法，文章点击数+1
        $count = intval($news['countnum']) + 1;

        // 更新文章点击数
        D('News')->updateCount($id, $count);

        //获取文章副表内容
        $content = D("NewsContent")->find($id);
        // 实体化转译文章内容
        $news['content'] = htmlspecialchars_decode($content['content']);

        // 将数据赋值给模板
        $this->assign('result', array(
            // 文章栏目id
            'catId' => $news['catid'],
            'news' => $news,
        ));
        $this->display("Detail/index");
    }

    /**
     * 在文章后台实现预览
     */
    public function view()
    {
        if(!getLoginUsername()) {
            $this->error("您没有权限访问该页面");
        }
        $this->index();
    }

}
