<?php
/**
 * 文章内容管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;


class ContentController extends CommonController {

    /**
     * 文章首页
     */
    public function index() {
        $conds = array();
        $title = $_GET['title'];
        // 传递过来 筛选关键字
        if($title) {
            $conds['title'] = $title;
        }
        // 传递过来前端栏目
        if($_GET['catid']) {
            $conds['catid'] = intval($_GET['catid']);
            $this->assign('menuId', $conds['catid']);
        }

        // 没传递过来p,默认为一
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 5;

        // 分页获取文章内容
        $news = D("News")->getNews($conds,$page,$pageSize);
        // 获取文章总数
        $count = D("News")->getNewsCount($conds);

        // 使用分页类
        $res  =  new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        // 获取文章推荐位
        $positions = D("Position")->getNormalPositions();
        $this->assign('pageres',$pageres);
        $this->assign('news',$news);
        $this->assign('positions', $positions);
        // 获取前端栏目
        $this->assign('webSiteMenu',D("Menu")->getBarMenus());
        $this->display();
    }

    /**
     * 添加文章,分两个表插入数据
     */
    public function add(){
        // 如果有提交数据
        if($_POST) {
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'标题不存在');
            }
            if(!isset($_POST['small_title']) || !$_POST['small_title']) {
                return show(0,'短标题不存在');
            }
            if(!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0,'文章栏目不存在');
            }
            if(!isset($_POST['keywords']) || !$_POST['keywords']) {
                return show(0,'关键字不存在');
            }
            if(!isset($_POST['content']) || !$_POST['content']) {
                return show(0,'content不存在');
            }

            // 接收edit时提交过来的news_id
            if($_POST['news_id']) {
                return $this->save($_POST);
            }
            $newsId = D("News")->insert($_POST);        // 主表完成数据插入
            if($newsId) {
                $newsContentData['content'] = $_POST['content'];
                $newsContentData['news_id'] = $newsId;
                // 副表数据插入
                $cId = D("NewsContent")->insert($newsContentData);
                if($cId){
                    return show(1,'新增成功');
                }else{
                    return show(1,'主表插入成功，副表插入失败');
                }
            }else{
                return show(0,'新增失败');
            }

        }else {         // 显示文章添加页面
            // 获取前端栏目名
            $webSiteMenu = D("Menu")->getBarMenus();
            // 文章添加配置项
            $titleFontColor = C("TITLE_FONT_COLOR");
            $copyFrom = C("COPY_FROM");
            //var_dump($copyFrom);die;

            $this->assign('webSiteMenu', $webSiteMenu);
            $this->assign('titleFontColor', $titleFontColor);
            $this->assign('copyfrom', $copyFrom);

            $this->display();
        }
    }

    /**
     * 将编辑文章内容获取到，并显示
     */
    public function edit()
    {
//        echo 1;exit;
        $newsId = $_GET['id'];
        if(!$newsId){
            $this->redirect('./admin.php?c=content');
        }
        $news = D("News")->find($newsId);
//        var_dump($news); die;
        if(!$news) {
            $this->redirect('./admin.php?c=content');
        }
        $newsContent = D("NewsContent")->find($newsId);
//        var_dump($newsContent);die;
        if($newsContent){
            $news['content'] = $newsContent['content'];
        }
        // 文章栏目
        $webSiteMenu = D("Menu")->getBarMenus();
        $this->assign('webSiteMenu',$webSiteMenu);
        // 标题颜色
        $this->assign('titleFontColor',C('TITLE_FONT_COLOR'));
        // 文章来源
        $this->assign('copyfrom',C("COPY_FROM"));
        $this->assign('news',$news);
        $this->display();
    }


    /**
     * 将编辑后文章内容保存
     * @param $data
     */
    public function save($data)
    {
        // $data2 = $data;
        // echo "<pre>"; var_dump($data2);die;
        $newsId = $data['news_id'];
        unset($data['news_id']);

        try{
            $id = D("News")->updateById($newsId,$data);
//            echo "1111";die;
            $newsContentData['content'] = $data['content'];
            $condId = D("NewsContent")->updateNewsById($newsId,$newsContentData);
            if($id === false || $condId ===false){
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }

    /**
     * 设置文章状态(删除)
     */
    public function setStatus() {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
//                var_dump($status);die;
                if (!$id) {
                    return show(0, 'ID不存在');
                }
                $res = D("News")->updateStatusById($id, $status);
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }
            }
            return show(0, '没有提交的内容');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }

    /**
     * 文章排序操作
     */
    public function listorder() {
        $listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
//        print_r($listorder);exit;       Array ( [21] => 2 [24] => 1 [25] => 22 )  以数组形式传递
        $errors = array();
        try {
            if ($listorder) {
                foreach ($listorder as $newsId => $v) {
                    // 执行更新
                    $id = D("News")->updateNewsListorderById($newsId, $v);
                    if ($id === false) {
                        $errors[] = $newsId;
                    }
                }
                if ($errors) {
                    return show(0, '排序失败-' . implode(',', $errors), array('jump_url' => $jumpUrl));
                }
                return show(1, '排序成功', array('jump_url' => $jumpUrl));
            }
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(0,'排序数据失败',array('jump_url' => $jumpUrl));
    }

    /**
     * 完成文章推送
     */
    public function push() {
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $positionId = intval($_POST['position_id']);        // 对post提交推荐位id取整
        $newsId = $_POST['push'];                           // ajax传递过来文章id的数组

        // 没有勾选文章id
        if(!$newsId || !is_array($newsId)){
            return show(0,'请选择推荐的文章Id进行推荐');
        }

        // 没有选择推荐位
        if(!$positionId) {
            return show(0,'没有选择推荐位');
        }
//        print_r($newsId);exit;

        try {
            $news = D("News")->getNewsByNewsIdIn($newsId);
            if(!$news){
                return show(0,'没有相关内容');
            }

            foreach ($news as $new){
                $data = array(
                    'position_id' => $positionId,
                    'title' => $new['title'],
                    'thumb'=>$new['thumb'],
                    'news_id' => $new['news_id'],
                    'status' => 1,
                    'create_time' =>$new['create_time']
                );
                // 将文章部分内容，存进推荐位content中
                $position = D("PositionContent")->insert($data);
            }
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        return show(1,'推荐成功',array('jump_url'=>$jumpUrl));
    }


}