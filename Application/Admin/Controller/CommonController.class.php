<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->_init();
    }
    /**
     * 初始化
     * 没有登录跳转到登录页面
     */
    private function _init() {
        // 如果已经登录
        $isLogin = $this->isLogin();
        if(!$isLogin) {
            // 未登录跳转到登录页面
            $this->redirect('/thinkphp/admin.php?c=login');
        }
    }
    /**
     * 获取登录用户信息
     * @return array
     */
    public function getLoginUser() {
        return session("adminUser");
    }
    /**
     * 判定是否登录
     * @return boolean
     */
    public function isLogin() {
        $user = $this->getLoginUser();
        if($user && is_array($user) && $user['username']) {
            return true;
        }
        return false;
    }

    /**
     * 更改文章状态
     * @param $data
     * @param $models
     */
    public function setStatus($data, $models) {
        try {
            if ($_POST) {
                $id = $data['id'];
                $status = $data['status'];
                if (!$id) {
                    return show(0, 'ID不存在');
                }
                $res = D($models)->updateStatusById($id, $status);
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
     * 公共的排序功能
     * @param string $model
     */
    public function listorder($model='') {
        $listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = array();
        try {
            if ($listorder) {
                foreach ($listorder as $id => $v) {
                    // 执行更新
                    $id = D($model)->updateListorderById($id, $v);
                    if ($id === false) {
                        $errors[] = $id;
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

}