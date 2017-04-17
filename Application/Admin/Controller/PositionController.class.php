<?php

/**
 * 后台推荐位
 */
namespace Admin\Controller;
use Think\Controller;
class PositionController extends CommonController
{
    /**
     * 将推荐位内容显示在页面
     */
    public function index()
    {
        $data['status'] = array('neq',-1);
        $positions = D("Position")->select($data);
        $this->assign('positions',$positions);
        $this->assign('nav','推荐位管理');
        $this->display();
    }

    /**
     * 添加推荐位
     */
    public function add() {
        if(IS_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0, '推荐位名称为空');
            }
            /**
             * 如果编辑提交了id，在save(方法保存)
             */
            if($_POST['id']) {
                return $this->save($_POST);
            }
            try {
                $id = D("Position")->insert($_POST);
                if($id) {
                    return show(1,'新增成功',$id);
                }
                return show(0,'新增失败',$id);


            }catch(Exception $e) {
                return show(0, $e->getMessage());
            }
            return show(0, '新增失败',$newsId);
        }else {
            $this->display();
        }

    }

    /**
     * 将要修改推荐位信息，显示在编辑页面
     */
    public function edit() {
        $data = array(
            'status' => array('neq',-1),
        );
        $id = $_GET['id'];
        $position = D("Position")->find($id);
        $this->assign('position', $position);
        $this->display();

    }

    /**
     * 将编辑数据保存到数据库
     * @param $data
     */
    public function save($data) {
        $id = $data['id'];
        unset($data['id']);
        try {
            $id = D("Position")->updateById($id,$data);
            if($id === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch (Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    /**
     * 编辑推荐位状态
     * status=1 正常 0关闭 -1删除
     */
    public function setStatus(){
        try {
            if ($_POST) {
                $id = $_POST['id'];
//                var_dump($id);die;
                $status = $_POST['status'];
                $res = D("Position")->updateStatusById($id, $status);
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }

            }
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }

        return show(0, '没有提交的内容');
    }

}