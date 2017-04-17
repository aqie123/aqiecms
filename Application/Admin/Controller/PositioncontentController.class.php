<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 推荐位内容控制器
 * Class PositioncontentController
 * @package Admin\Controller
 */
class PositioncontentController extends CommonController
{
    public function index()
    {
        // 获取推荐位数据
        $positions = D("Position")->getNormalPositions();
        $data['status'] =array('neq',-1);
        // 接收传递过来的文章搜索条件
        if($_GET['title']){
            $data['title'] = trim($_GET['title']);
            $this->assign('title', $data['title']);
        }
//        $data['title'] = $_GET['title'] ? trim($_GET['title']) : '输入文章标题进行搜索';
        // 没有传递position_id,获取推荐位里面第一条  通过传递过来position_id实现搜索功能
        $data['position_id'] = $_GET['position_id'] ? intval($_GET['position_id']) : $positions[0]['id'];
        // 获取推荐位内容数据
        $contents = D("PositionContent")->select($data);
        $this->assign('positions', $positions);
        $this->assign('contents', $contents);
        $this->assign('positionId', $data['position_id']);
        $this->display();
    }

    /**
     * 手动添加推荐位
     */
    public function add()
    {
        if($_POST) {
            if(!isset($_POST['position_id']) || !$_POST['position_id']) {
                return show(0, '推荐位ID不能为空');
            }
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0, '推荐位标题不能为空');
            }
            if(!$_POST['url'] && !$_POST['news_id']) {
                return show(0, 'url和news_id不能同时为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']) {
                // 提交了文章id,则将该文章id缩略图给当前文章
                if($_POST['news_id']) {
                    $res = D("News")->find($_POST['news_id']);
                    // 有这个字段，并且是个数组
                    if($res && is_array($res)) {
                        $_POST['thumb'] = $res['thumb'];
                    }
                }else{
                    return show(0,'图片不能为空');
                }

            }
            // 接收编辑数据的id,跳转到save方法
            if($_POST['id']) {
                return $this->save($_POST);
            }
            try{
                $id = D("PositionContent")->insert($_POST);
                if($id) {
                    return show(1, '新增成功');
                }
                return show(0, '新增失败');
            }catch(Exception $e) {
                return show(0, $e->getMessage());
            }
        }else {
            $positions = D("Position")->getNormalPositions();
            $this->assign('positions', $positions);
            $this->display();
        }
    }

    /**
     * 将要编辑数据显示到页面
     */
    public function edit()
    {
        // 接收编辑提交id
        $id = $_GET['id'];
        // 获取推荐位内容
        $position = D("PositionContent")->find($id);
        // 获取推荐位
        $positions = D("Position")->getNormalPositions();
        $this->assign('positions', $positions);
        $this->assign('content', $position);
        $this->display();
    }

    /**
     * 将接收到编辑数据调用模型，存到数据库
     */
    public function save($data)
    {
        $id = $data['id'];
        unset($data['id']);

        try {
            $resId = D("PositionContent")->updateById($id, $data);
            if($resId === false) {
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }

    /**
     * 点击更改文章状态
     * @return mixed
     */
    public function setStatus() {

        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data, 'PositionContent');
    }

    /**
     * 实现推荐位内容排序
     * @return mixed
     */
    public function listorder() {
        return parent::listorder("PositionContent");
    }

}