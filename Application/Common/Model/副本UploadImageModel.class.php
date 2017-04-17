<?php
namespace Common\Model;
use Think\Model;

/**
 * 上传图片类
 * @author  aqie
 */
class UploadImageModel extends Model {
    private $_uploadObj = '';
    private $_uploadImageData = '';
    const UPLOAD = 'upload';

    public function __construct() {
        $this->_uploadObj = new  \Think\Upload();

        $this->_uploadObj->rootPath = './'.self::UPLOAD.'/';  //   ./upload/
        $this->_uploadObj->subName = date(Y) . '/' . date(m) .'/' . date(d);
    }
    /**
     * @return string
     */
    public function upload() {
        $res = $this->_uploadObj->upload();

        if($res) {
            return '/' .self::UPLOAD . '/' . $res['imgFile']['savepath'] . $res['imgFile']['savename'];
        }else{
            return false;
        }
    }

    public function imageUpload()
    {
        $res = $this->_uploadObj->upload();
        print_r($res);exit;
        if($res){
            return '/'.self::UPLOAD . '/' . $res['file']['savepath'] . $res['file']['savename'];
        }else{
            return false;
        }
    }

}