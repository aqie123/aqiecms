<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

/**
 * 数据库自动备份
 * Class CronController
 * @package Admin\Controller
 */
class CronController {


    public function dumpmysql() {
        $result = D("Basic")->select();
        if(!$result['dumpmysql']) {
            die("系统没有设置开启自动备份数据库的内容");
        }
        $shell = "mysqldump -u".C("DB_USER").C("DB_PWD") .C("DB_NAME")." > /tmp/cms".date("Ymd").".sql";
//        echo $shell;
        exec($shell);
    }
}