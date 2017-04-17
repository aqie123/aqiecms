<?php
namespace Admin\Controller;
use Think\Controller;
// use Common\Model  框架默认加载里面内容
class LoginController extends Controller
{
    // 显示登录页面
    public function index()
    {
        // 如果用户登录，直接跳转到首页
        if(session('adminUser')){
            $this->redirect('/admin.php?c=index');
        }
        // admin.php?c=index    /index.php?m=admin&c=index
        $this->display();
    }
    public function check()
    {
         //print_r($_POST);  exit();        // 打印post提交数据

        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo getMd5Password($password);die;
        if(!trim($username)){
            return show(0,'用户名不能为空');
        }
        if(!trim($password)){
            return show(0,'密码不能为空');
        }
        // 数据库里获取用户名那条数据  D实例化model层方法
        $res = D('Admin')->getAdminByUserName($username);
//        print_r($res);      // 打印出对应用户名信息
        // 可以更改管理员登录状态
        if(!$res || $res['status'] !=1){
            return show(0,'该用户不存在');
        }
        if($res['password'] != getMd5Password($password)){
            return show(0,'用户名或密码错误');
        }
        D("Admin")->updateByAdminId($res['admin_id'],array('lastlogintime'=>time()));
        // 将用户登录信息存入session
        session('adminUser',$res);
        return show(1,'登陆成功');
    }

    public function loginout()      //退出登录
    {
        session('adminUser',null);
        $this->redirect('/admin.php?c=login');
    }

}