<?php
namespace Common\Model;
use Think\Model;

/**
 * 内容副表模型，主要存储文章内容
 * Class NewsContentModel
 * @package Common\Model
 */
class NewsContentModel extends Model {
    private $_db = '';

    public function __construct() {
        $this->_db = M('news_content');
    }

    /**
     * 文章副表内容插入数据库
     * @param array $data
     * @return int|mixed
     */
    public function insert($data=array()){
        if(!$data || !is_array($data)) {
            return 0;
        }
        $data['create_time'] = time();
        if(isset($data['content']) && $data['content']) {
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->add($data);
    }

    /**
     * 根据id查询文章内容
     * @param array|mixed $id
     * @return mixed
     */
    public function find($id) {
        return $this->_db->where('news_id='.$id)->find();
    }

    /**
     * 副表根据文章id更新文章内容
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateNewsById($id,$data){
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }
        if(isset($data['content']) && $data['content']){
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->where('news_id='.$id)->save($data);
    }


}