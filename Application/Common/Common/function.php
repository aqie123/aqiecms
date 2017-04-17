<?php
/**
 * 公用方法
 */
/**
 * @param $status
 * @param $message
 * @param array $data
 */
function show($status,$message,$data=array())
{
    $result = array(
        'status'=>$status,
        'message'=>$message,
        'data'=>$data

    );
    exit(json_encode($result));
}

/**
 * 对MD5密码加前缀
 * @param $password
 * @return string
 */
function getMd5Password($password)
{
    return md5($password.C('MD5_PRE'));     // 配置文件中前缀
}

/**
 * 将Menutype对应显示成文字
 * @param $type
 * @return string
 */
function getMenuType($type)          // 菜单将数字显示为中文
{
    return $type == 1 ? '后端菜单' : '前端导航';
}

/**
 * 将菜单中状态显示成文字
 * @param $status
 * @return int|string
 */
function getStatus($status)
{
    $str = 0;
    if($status == 0){
        $str = '关闭';
    }elseif ($status == 1){
        $str = '正常';
    }elseif ($status == -1){
        $str = '删除';
    }
    return $str;
}
/**
 * 左侧导航菜单获取adminURL
 */
function getAdminMenuUrl($nav)
{
    $url = '/admin.php?c='.$nav['c'].'&a='.$nav['a'];
    if($nav['f'] == 'index'){       //方法是index，后面方法省略
        $url = '/admin.php?c='.$nav['c'];
    }
    return $url;
}
/**
 * 高亮当前菜单导航
 */
function getActive($navc)
{
    $c = strtolower(CONTROLLER_NAME);       // 控制器转换成小写
    if(strtolower($navc) == $c){            //传过来控制器等于上面控制器
        return 'active';
    }
    return '';
}

/**
 * 文本编辑器上传图片
 */
function showKind($status,$data){
    header('Content-type:application/json;charset=UTF-8');
    if($status == 0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}

/**
 *获取登录用户名
 */
function getLoginUsername(){
    return $_SESSION['adminUser']['username'] ? $_SESSION['adminUser']['username'] : "";
}

/**
 * 文章页面获取分类名称
 * @param $navs
 * @param $id
 * @return string
 */
function getCatName($navs,$id){
    foreach($navs as $nav) {
        $navList[$nav['menu_id']] = $nav['name'];
    }
    return isset($navList[$id]) ? $navList[$id] : '';
}

/**
 * 获取文章页面来源名称
 * @param $id
 * @return string
 */
function getCopyFromById($id) {
    $copyFrom = C("COPY_FROM");
    return $copyFrom[$id] ? $copyFrom[$id] : '';
}

/**
 * 文章页面获取缩略图
 * @param $thumb
 * @return string
 */
function isThumb($thumb) {
    if($thumb) {
        return '<span style="color:red">有</span>';
    }
    return '无';
}


/**
 * 对文章截取显示
 * @param $str
 * @param $limit
 * @return string
 */
function cut($str, $limit) {
    if(strlen($str)>$limit){
        $restr = '';
        for($i=0;$i< $limit-3;$i++) {
            $restr .= ord($str[$i])>127 ? $str[$i].$str[++$i].$str[++$i] : $str[$i];
        }
        return $restr.'...';
    }else{
        return $str;
    }

}