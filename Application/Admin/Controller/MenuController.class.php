<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**后台菜单相关
 * Class MenuController
 * @package Admin\Controller
 */
class MenuController extends CommonController {
    public function index(){        //菜单首页
        $data = array();

        // 分类显示前后端菜单
        // 有提交过来的type值，并且在0和1之间,
        if(isset($_REQUEST['type']) && in_array($_REQUEST['type'],array(0,1))){
            $data['type'] = intval($_REQUEST['type']);  // 取整
            $this->assign('type',$data['type']);
        }else{
            $this->assign('type',-1);
        }
        /**
         * 菜单管理分页显示
         */

        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $menus = D("Menu")->getMenus($data,$page,$pageSize);
        $menusCount = D("Menu")->getMenusCount($data);
        //think自带分页方法
        $res = new \Think\Page($menusCount,$pageSize);
        $pageRes = $res->show();       //获取数据
        $this->assign('pageRes',$pageRes);
        $this->assign('menus',$menus);
        $this->display();
    }
    public function add(){          // 添加菜单
        if($_POST){
//            print_r($_POST);  // 打印ajax post提交数据
            // 数据验证
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'菜单名不能为空');
            }
            if(!isset($_POST['m']) || !$_POST['m']) {
                return show(0,'模块名不能为空');
            }
            if(!isset($_POST['c']) || !$_POST['c']) {
                return show(0,'控制器不能为空');
            }
            if(!isset($_POST['f']) || !$_POST['f']) {
                return show(0,'方法名不能为空');
            }
            if($_POST['menu_id']) {                 // 点击提交添加按钮后 如果存在id，也就是编辑则直接保存
                return $this->save($_POST);
            }
            // 数据存入数据库
            $menuId = D("Menu")->insert($_POST);
            if($menuId){
                return show(1,'新增成功',$menuId);
            }
            return show(0,'新增失败',$menuId);
        }else{
            $this->display();
        }

    }

    /**
     * 显示编辑菜单页面
     */
    public function  edit()
    {
        $menuId = $_GET['id'];
        $menu = D("Menu")->find($menuId);    //调用model方法
        $this->assign('menu',$menu);        // 传递给模板
        $this->display();
    }

    /**
     * @param $data
     * 编辑菜单信息调用模型存入数据库
     */
    public function save($data) {
        $menuId = $data['menu_id'];
        unset($data['menu_id']);

        try {
            $id = D("Menu")->updateMenuById($menuId, $data);        //调用MenuModel里面方法
            if($id === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }

    }

    /**
     * 更改显示状态完成删除菜单
     */
    public function setStatus(){
        try{
            if($_POST){
                $id = $_POST['id'];
                $status = $_POST['status'];
                $status = $status+0;
                // var_dump($status);die;              // 更新菜单状态，报错不合法
                // 执行数据更新
                $res = D("Menu")->updateStatusById($id,$status);
                if($res){
                    return show(1,'操作成功');
                }else{
                    return show(0,'操作失败');
                }
            }
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        return show(0,"没有提交的数据");
    }
    /**
     * 菜单排序
     */
    public function listorder(){
        $listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = array();
        if($listorder){
            try{
                foreach($listorder as $menuId => $v){
                    // 进行更新
                    $id = D("Menu")->updateMenuListorderById($menuId,$v);
                    if($id === false){
                        $errors[] = $menuId;
                    }
                }
            }catch(Exception $e){
                return show(0,$e->getMessage(),array('jump_url'=>$jumpUrl));
            }
            if($errors){
                return show(0,'排序失败-'.implode(',',$errors),array('jump_url'=>$jumpUrl));
            }
            return show(1,'排序成功',array('jump_url'=>$jumpUrl));
        }
        return show(0,'排序数据失败',array('jump_url'=>$jumpUrl));
    }

}