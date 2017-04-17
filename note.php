<?php

/*Application  应用目录
 *Public 资源目录
 * ThinkPHP 框架目录
 * Common 核心函数
 * Conf 核心配置目录
 * Library 框架类目录
 * Model 框架应用模式
 * Tpl 系统模板目录
 *


*/

/*
 * 前台
 * http://www.aqie.com/thinkphp/index.php?m=home&c=index&a=add  ()
 *
 * 后台登录页面
 * http://www.aqie.com/thinkphp/index.php?m=admin&c=login
 * 后台首页
 * http://www.aqie.com/thinkPHP/index.php?m=admin&c=index
 *
 * LoginController下面建index方法  ->views/login/index.php
 * */

// 如果变量存在

$var = 0;
if (isset($var)) {      //一般用来检测变量是否设置
    echo '$var存在';
} else {
    echo '$var is not set at all';
}
if (empty($var)) {      //功能：检查一个变量是否为空
    echo '$var is either 0 or not set at all';
}else {
    echo '$var';
}

/*
 * 编辑删除菜单->public/js/admin/common.js 里面跳转
 * 点击删除，调用MenuController里面setStatus方法
 * 控制器里面调用MenuModel里面方法
 *
 *
 * 生成菜单时，调用common/common/function里面getAdminMenuUrl方法
 *
 * 图片上传 public/js/admin/image.js
 * */
echo "<script>";
echo '';
echo "</script>";

$name = $_POST['username'];
echo $name."好啊"."<br>";

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

aaa
<form action="" method="post">
    <input type="text" name="username">
    <button>提交</button>
</form>

<!--<label id="INFO" />-->



<script>
    var sends = 100;
    function Go(){
        if(--sends == 0){
            window.location.href="https://aqie123.github.io/Tetris/";  //时间跳转的链接
        }else {
            INFO.innerHTML = "浏览器将在"+sends+"后跳转到啊切首页";
        }

    }
    setInterval("Go()",1000);  //设置定时器为1秒
</script>
</body>
</html>

