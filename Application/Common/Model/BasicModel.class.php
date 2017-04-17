<?php
namespace Common\Model;
use Think\Model;

/**
 * 基本配置模型
 * Class BasicModel
 * @package Common\Model
 */
class BasicModel extends Model
{

    public function __construct()
    {

    }

    /**
     * 保存到数据库
     * @param array $data
     * @return mixed
     */
    public function save($data = array()) {
        if(!$data) {
            throw_exception('没有提交的数据');
        }
        // 将数据写入到静态缓存中
        $id = F('basic_web_config', $data);
        return $id;
    }

    /**
     * 获取保存的静态缓存数据
     * @return mixed
     */
    public function select() {
        return F("basic_web_config");
    }
}