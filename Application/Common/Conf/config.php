<?php
return array(
	//'配置项'=>'配置值'
    //URL地址不区分大小写
    'URL_CASE_INSENSITIVE' =>true,
    'URL_MODEL'=>0,
    'LOAD_EXT_CONFIG' => 'db',
    'MD5_PRE'=>'aqie_cms',
    // 静态化默认后缀
    'HTML_FILE_SUFFIX' => '.html',
    // 文章来源
    'COPY_FROM' => array(
        0 => '本站',
        1 => '新浪网',
        2 => '央视网',
        3 => '网易',
        4 => '搜狐',

    ),

    /**
     * tp路由层面伪静态
     */
    // 开启路由
    'URL_ROUTER_ON'   => true,
    // 定义规则
    'URL_ROUTE_RULES'=>array(
        // 'news/:year/:month/:day' => array('News/archive', 'status=1'),
        // 'news/:id'               => 'News/read',
       //  'news/read/:id'          => '/news/:1',
        //'login/:year/:month' => array('admin/index','status=1'),
    ),
);