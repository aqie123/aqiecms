<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 后台管理员控制器
 * Class AdminController
 * @package Admin\Controller
 */
class AdminController extends CommonController
{
    /**
     * 加载管理员列表页面
     */
    public function index(){
        // $s = $_SESSION;
        $admins = D('Admin')->getAdmins();
        $this->assign('admins', $admins);
        $this->display();
    }

    /**
     * 添加用户
     */
    public function add() {

        // 保存数据
        if(IS_POST) {

//            print_r($_POST);die;

            if(!isset($_POST['username']) || !$_POST['username']) {
                return show(0, '用户名不能为空');
            }

            if(!isset($_POST['password']) || !$_POST['password']) {
                return show(0, '密码不能为空');
            }
            if($_POST['password'] != $_POST['confirm']) {
                return show(0, '两次密码不一致');
            }
            $_POST['password'] = getMd5Password($_POST['password']);
            // 判定用户名是否存在
            $admin = D("Admin")->getAdminByUsername($_POST['username']);
            if($admin && $admin['status']!=-1) {
                return show(0,'该用户存在');
            }

            // 新增
            $id = D("Admin")->insert($_POST);
            if(!$id) {
                return show(0, '新增失败');
            }
            return show(1, '新增成功');
        }
        $this->display();
    }

    /**
     * 更改管理员状态
     */
    public function setStatus() {
        // 调用模型里面updateStatusById（）
        $data = array(
            'admin_id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($_POST,'Admin');
    }

    /**
     *展示个人信息页面
     */
    public function personal() {
        $res = $this->getLoginUser();
        $user = D("Admin")->getAdminByAdminId($res['admin_id']);
        $this->assign('vo',$user);
        $this->display();
    }

    /**
     * 保存新添加用户信息进数据库
     */
    public function save() {
        $user = $this->getLoginUser();
        if(!$user) {
            return show(0,'用户不存在');
        }

        $data['realname'] = $_POST['realname'];
        $data['email'] = $_POST['email'];

        try {
            $id = D("Admin")->updateByAdminId($user['admin_id'], $data);
            if($id === false) {
                return show(0, '配置失败');
            }
            return show(1, '配置成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }




}