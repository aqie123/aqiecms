<?php
namespace Common\Model;
use Think\Model;

/**
 * 文章内容模型
 * Class NewsModel
 * @package Common\Model
 */
class NewsModel extends Model
{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('news');
    }

    /**
     * 文章主表内容插入数据库
     * @param array $data
     * @return int|mixed
     */
    public function insert($data =array())
    {
        // 不是数组或者数组不存在
        if(!is_array($data) || !$data){
            return 0;
        }
        $data['create_time'] = time();
        $data['username'] = getLoginUsername();
        return $this->_db->add($data);          // 数据库插入

    }

    /**
     * 分页获取文章信息，列表显示在后台内容主页
     * @param $data
     * @param $page
     * @param int $pageSize
     */
    public function getNews($data,$page,$pageSize = 10){
        $conditions = $data;
        // 如果传递过来关键字 title
        if(isset($data['title']) && $data['title']) {
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        // 传递过来前端分类cateid,并且存在
        if(isset($data['catid']) && $data['catid']) {
            $conditions['catid'] = intval($data['catid']);
        }
        // 获取状态所有不为-1的文章内容
        $conditions['status'] = array('neq',-1);
        // 对数据分页显示
        $offset = ($page -1) *$pageSize;
        $list = $this->_db->where($conditions)
            ->order('listorder desc,news_id desc')
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }

    /**
     * 获取文章总数
     * @param array $data
     * @return mixed
     */
    public function getNewsCount($data = array()){
        $conditions = $data;
        if(isset($data['title']) && $data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['catid']) && $data['catid']) {
            $conditions['catid'] = intval($data['catid']);
        }
        $conditions['status'] = array('neq',-1);
        return $this->_db->where($conditions)->count();
    }

    /**
     * 根据id查询文章所有信息
     * @param array|mixed $id
     * @return mixed
     */
    public function find($id) {
        $data = $this->_db->where('news_id='.$id)->find();
        return $data;
    }

    /**
     * 主表根据news_id更新文章信息
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateById($id,$data){
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }
        return $this->_db->where('news_id='.$id)->save($data);
    }

    /**
     * 删除文章操作 （更新文章）  这个只有主表有
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception('status不能为非数字');
        }
        if(!$id || !is_numeric($id)) {
            throw_exception('id不合法');
        }
        $data['status'] = $status;

        return $this->_db->where('news_id='.$id)->save($data);
    }

    /**
     * 实现文章排序数据库保存
     * @param $id
     * @param $listorder
     * @return bool
     */
    public function updateNewsListorderById($id, $listorder)
    {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array('listorder'=>intval($listorder));
        return $this->_db->where('news_id='.$id)->save($data);
    }

    /**
     * 查询文章中是否有传过来id
     * @param $newsIds
     * @return mixed
     */
    public function getNewsByNewsIdIn($newsIds)
    {
        if(!is_array($newsIds)){        // 如果变量不是数组
            throw_exception("参数不合法");
        }
        $data = array(
            'news_id' => array('in',implode(',',$newsIds))
        );
        return $this->_db->where($data)->select();
    }

    /**
     * 获取排行数据
     * @param array $data
     * @param int $limit
     * @return mixed
     */
    public function getRank($data = array(), $limit = 100) {
        $list = $this->_db->where($data)->order('countnum desc,news_id desc ')->limit($limit)->select();
        return $list;
    }

    /**
     * 查询文章所有数据
     * @param array $data
     * @param int $limit
     * @return mixed
     */
    public function select($data = array(), $limit = 100) {

        $conditions = $data;
        $list = $this->_db->where($conditions)->order('news_id desc')->limit($limit)->select();
        return $list;
    }

    /**
     * 更新文章点击数
     * @param $id
     * @param $count
     * @return bool
     */
    public function updateCount($id, $count) {
        if(!$id || !is_numeric($id)) {
            throw_exception("ID 不合法");
        }
        if(!is_numeric($count)) {
            throw_exception("count不能为非数字");
        }
        $data['countnum'] = $count;
        return $this->_db->where('news_id='.$id)->save($data);

    }

    /**
     * 获取文章最大点击数
     * @return mixed
     */
    public function maxcount() {
        $data = array(
            'status' => 1,
        );
        return $this->_db->where($data)->order('countnum desc')->limit(1)->find();
    }


}