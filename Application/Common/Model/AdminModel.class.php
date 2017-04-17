<?php
namespace Common\Model;
use Think\Model;

/**
 * Class AdminModel
 * @package Common\Model
 * 后台用户登录模型
 */
class AdminModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('admin');        //实例化数据库对象(表admin)
    }

    /**查询一条数据
     * 判断管理员用户是否存在
     * @param $username
     * @return mixed
     */
    public function getAdminByUserName($username){
        $res = $this->_db->where('username="'.$username.'"')->find();
        return $res;
    }

    /**
     * 获取所有管理员，加载到管理员显示页面
     * @return mixed
     */
    public function getAdmins() {
        $data = array(
            'status' => array('neq',-1),
        );
        return $this->_db->where($data)->order('admin_id desc')->select();
    }

    /**
     * 将添加管理员存进数据库
     * @param array $data
     * @return int|mixed
     */
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    /**
     * 更改状态
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return  $this->_db->where('admin_id='.$id)->save($data); // 根据条件更新记录

    }

    /**
     * 更新管理员最后登录时间  更新管理员新添加个人信息
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateByAdminId($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('admin_id='.$id)->save($data); // 根据条件更新记录
    }

    /**
     * 通过adminid获取管理员信息
     * @param int $adminId
     * @return mixed
     */
    public function getAdminByAdminId($adminId=0) {
        $res = $this->_db->where('admin_id='.$adminId)->find();
        return $res;
    }

    /**
     * 获取最后登陆用户
     * @return mixed
     */
    public function getLastLoginUsers() {
        $time = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $data = array(
            'status' => 1,
            'lastlogintime' => array("gt",$time),
        );

        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
    }
}