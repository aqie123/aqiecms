<?php
/**
 * 图片上传
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

/**
 * Class ImageController
 * @package Admin\Controller
 */
class ImageController extends CommonController
{
    private $_uploadObj;
    public function __construct(){

    }

    /**
     * 异步上传图片缩略图
     * ajaxuploadimage
     */
    public function ajaxuploadimage() {
        $upload = D("UploadImage");
        $res = $upload->imageUpload();
        if($res===false) {
            return show(0,'上传失败','');
        }else{
            return show(1,'上传成功',$res);
        }
    }

    /**
     *文本编辑器上传图片
     */
    public function kindupload(){
        $upload = D("UploadImage");
        $res = $upload->upload();
        if($res === false){
            return showKind(1,'上传失败');
        }
        return showKind(0,$res);
    }

}