<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 基本配置控制器
 * Class BasicController
 * @package Admin\Controller
 */
class BasicController extends CommonController
{
    public function index()
    {
        $result = D("Basic")->select();
//        echo json_encode($result);exit;
        $this->assign('vo', $result);
        $this->assign('type',1);
        $this->display();
    }

    /**
     * 保存配置到数据库
     */
    public function add()
    {
        if($_POST){
            if(!$_POST['title']) {
                return show(0, '站点信息不能为空');
            }
            if(!$_POST['keywords']) {
                return show(0, '站点关键词');
            }
            if(!$_POST['description']) {
                return show(0, '站点描述');
            }
            D("Basic")->save($_POST);
            return show(1, '配置成功');
        }else{
            return show(0,'没有提交内容');
        }
    }

    /**
     * 缓存管理 （这个好像没用）
     */
    public function cache() {
        $this->assign('type',2);
        $this->display();
    }


}