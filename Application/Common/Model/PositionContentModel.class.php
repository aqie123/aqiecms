<?php
namespace Common\Model;
use Think\Model;

/**
 * 推荐位内容模型
 * @author  aqie
 */
class PositionContentModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('position_content');
    }

    /**
     * 获取到的推荐位内容插入数据到数据库
     * @param array $res
     * @return int|mixed
     */
    public function insert($res=array()) {
        if(!$res || !is_array($res)) {
            return 0;
        }
        if(!$res['create_time']) {
            $res['create_time'] = time();
        }

        return $this->_db->add($res);
    }

    /**
     * 获取数据显示在推荐位内容首页
     * @param array $data
     * @param int $limit
     * @return mixed
     */
    public function select($data = array(),$limit = 0)
    {
        if($data['title']) {
            $data['title'] = array('like','%'.$data['title'].'%');
        }
        $this->_db->where($data)->order('listorder desc,id desc');
        if($limit){
            $this->_db->limit($limit);
        }
        $list = $this->_db->select();
        return $list;
    }

    /**
     * 编辑推荐位内容时获取编辑数据
     * @param array|mixed $id
     * @return mixed
     */
    public function find($id) {
        $data = $this->_db->where('id='.$id)->find();
        return $data;
    }

    /**
     * 将编辑数据保存到数据库
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
     * 编辑文章状态，保存到数据库
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
     * 将推荐位内容排序保存到数据库
     * @param $id
     * @param $listorder
     * @return bool
     */
    public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }

        $data = array('listorder'=>intval($listorder));
        return $this->_db->where('id='.$id)->save($data);

    }
}