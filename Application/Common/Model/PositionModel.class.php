<?php
namespace Common\Model;
use Think\Model;

/**
 * 模型
 * @author  aqie
 */
class PositionModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('position');
    }

    /**
     * 根据状态显示推荐位
     * @param array $data
     * @return mixed
     */
    public function select($data = array())
    {
        $conditions = $data;
        $list = $this->_db->where($conditions)->order('id')->select();
        return $list;
    }

    /**
     * 执行数据库插入
     * @param array $res
     * @return int|mixed
     */
    public function insert($res=array()) {
        if(!$res || !is_array($res)) {
            return 0;
        }
        $res['create_time'] = time();
        return $this->_db->add($res);
    }

    /**
     * 根据id查找数据
     * @param array|mixed $id
     * @return mixed
     */
    public function find($id) {
        $data = $this->_db->where('id='.$id)->find();
        return $data;
    }

    /**
     * 完成编辑推荐位数据更新
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateById($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
    }

    /**
     * 完成数据库推荐位状态更改
     * @param $id
     * @param $status
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
        return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录

    }

    /**
     * 获取正常推荐位内容
     * @return mixed
     */
    public function getNormalPositions() {
        $conditions = array('status'=>1);
        $list = $this->_db->where($conditions)->order('id')->select();
        return $list;
    }

    /**
     * 获取推荐位总数
     * @param array $data
     * @return mixed
     */
    public function getCount($data=array()) {
        $conditions = $data;
        $list = $this->_db->where($conditions)->count();

        return $list;
    }


}