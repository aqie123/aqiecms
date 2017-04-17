<?php
namespace Common\Model;
use Think\Model;

/**
 * 菜单控制器类
 * Class MenuModel
 * @package Common\Model
 */
class MenuModel extends  Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('menu');         // 表menu
    }

    /**
     *  添加菜单到数据库
     * @param array $data
     * @return int|mixed
     */
    public function insert($data = array())
    {
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    /**
     * 获取分页显示菜单列表数据
     * @param $data
     * @param $page
     * @param int $pageSize
     * @return mixed
     */
    public function getMenus($data,$page,$pageSize=10)
    {
        // 不需要删除数据
        $data['status'] =array('neq',-1);
        $offset = ($page-1)*$pageSize;
        $list = $this->_db->where($data)->order('listorder desc,menu_id')->limit($offset,$pageSize)->select();
        return $list;
    }

    /**
     * 获取菜单总数
     * @param array $data
     * @return mixed
     */
    public function getMenusCount($data=array())
    {
        $data['status'] =array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function find($id)             //获取编辑菜单id
    {
        if(!$id || !is_numeric($id)){        //不存在或者不是数字
            return array();
        }
        return $this->_db->where('menu_id='.$id)->find();
    }

    /**
     * 编辑数据存进数据库
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateMenuById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }

        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }

        return $this->_db->where('menu_id='.$id)->save($data);
    }

    /**
     * 删除后数据存入数据库
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatusById($id,$status)   // (删除)更新菜单显示状态
    {
        if(!is_numeric($id) || !$id){
            throw_exception("ID不合法");
        }
        if(!is_numeric($status)){       // 这里不能判断不存在
            throw_exception("状态不合法");
        }
        $data['status']= $status;
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    public function updateMenuListorderById($id,$listorder){        // 更新排序
        if(!$id ||!is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder'=>intval($listorder)
        );
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    /**
     * 获取左侧菜单栏
     * @return mixed
     */
    public function getAdminMenus()
    {
        $data = array(
            'status'=>array('neq',-1),      // 不等于负一
            'type'=>1                       // 后台菜单数据
        );
        return $this->_db->where($data)->order('listorder desc,menu_id')->select();

    }

    /**
     * 获取 前端 栏目，展示在添加文章下拉菜单
     * @return mixed
     */
    public function getBarMenus()
    {
        $data = array(
            'status' => 1,
            'type' => 0,
        );
        // 根据排序数字和菜单id排序
        $res = $this->_db->where($data)
                ->order('listorder desc,menu_id')
                ->select();
        //var_dump($res);die;
        return $res;
    }


}