1.路由相关
    insert into cms_admin (username,password)values('admin',md5('123aqie_cms'));

    a.测试 ： http://www.tp.com/index.php?m=home&c=index&a=add
    b.后台登录 ; http://www.tp.com/index.php?m=admin&c=login&a=index

    Application/Common/Conf/config.php                'LOAD_EXT_CONFIG' => 'db',之后新建db.php
    Application/Common/Conf/db.php          进行数据库配置
    Application/Common/Model/AdminModel.class.php   后台用户登录模型
    Application/Admin/CommonController.class.php        后台判断用户是否登录
    public/js/admin/image.js
1.1 后台用户登录
        public/js/dialog/layer.js 弹出层文件
        public/js/dialog.js   进行简单封装
        a.public/js/admin/common.js     定义路径常量，实现跳转 (添加,编辑,更新排序,)
        b.public/js/admin/login.js      异步登录（login.check()）
        c.点击提交按钮 login.check方法 ajax请求login/check
        d.Application/Common/Common/function.php          公用方法show(将数组数据转换为json格式)
        e.模型admin->getAdminByUserName() 查询一条数据与提交数据对比
        f.成功则在login.js进行跳转admin/index
        g.login/loginout
        h.对后台url进行优化

2.菜单 （MenuController.class.php）
    a.添加菜单
        点击添加按钮->common.js里面跳转到控制器里面add(方法),显示添加页面,
        在页面定义一些变量
        点击提交添加，通过common.js获取提交表单数据,异步提交到add(方法)
        创建MenuModel,D("Menu")->insert($_POST),将数据保存进数据库，
        然后跳转到菜单列表页面
    b.显示菜单列表
        1.实现菜单排序 分页显示
            控制器添加index(方法)，显示列表页面
            模型层通过 menu/getMenus($data,$page,$pageSize=10)获取分页数据
            控制器调用分页方法   $res = new \Think\Page($menusCount,$pageSize);
            页面 分页显示 ： $pageRes = $res->show();

            Common/Common/function.php中方法
            getMenuType() getStatus()：将菜单类型和状态显示成中文
        2.按前后端条件 筛选 菜单
            view:有form表单,name=type,0前台菜单,1是后台菜单
            控制器：index方法 通过 提交过来的$data['type'] 进行数据筛选，并将type值传递到模板，进行当前分类显示
    c.编辑菜单
        menu/edit 显示编辑页面
        menu/save->调用menu模型updateMenuById()更新数据
    d.更改菜单状态 正常1，关闭，删除-1
        点击按钮->common.js on-off方法->todelete()->控制器menu/setStatus->调用模型menu/updateStatusById
    e.删除菜单
    f.菜单排序
    g.左侧菜单展示
        模型menu/getAdminMenus


3.实现图片上传
    a.在image.js 调用upload插件方法
    b.在imageController里面编写
        ajaxuploadimage() 方法
    c.UploadImageModel()里面调用 imageUpload()方法

4. 在imageController里面编写
    kindupload()
    调用function.php里面  showKind($status,$data)方法


6.ContentController
    a.添加文章 add() :

        在MenuModel里面编写
        getBarMenus()  获取前端栏目名
        在Admin/Conf/config.php里面 添加颜色和来源配置项，并在模板循环显示

        文章提交是异步的，点击提交按钮->common.js->跳转到junpurl->Content控制器里面index方法
        调用模型插入到news表
        note: 文章插入 有两张表

    b. index();
        1.文章以列表展示

        2.完成分页
        3.完成搜索功能
            --实现文章按栏目搜索显示
                控制器调用 D("Menu")->getBarMenus() 完成前端分类展示
                模型 NewsModel 里面getNews() 和 getNewsCount()获取文章信息和文章总数
                将筛选条件斜肩new模型的上面两个方法

            --实现文章按关键字模糊搜索



    c.编辑文章内容：
        在common.js 有编辑通用方法
        ContentController

    保存编辑内容：点击提交按钮->common方法里面提交跳转到saveurl,
                调用content控制器里面add方法 接收input传过来的news_id
                在调用控制器里save方法  然后通过两个model将数据保存到数据库    (D('News')   where('news_id='.$id))
                成功后通过jumpurl 跳转到文章首页

    d.删除文章内容; 通过set_status_url ->content控制器里面setStatus方法

    e.更改文章状态，传递过去的是0字符串

    f.文章排序：点击按钮->common.js里面跳转到content控制器里面 listorder()方法
            再调用news model里面updateNewsListorderById(完成数据库更新)


7.推荐位管理 PositionController
    选择文章内容->选择推荐位
    在content控制器index方法里面获取推荐位,

    a.添加推荐位
        点击添加 调用common.js里面添加方法,然后通过
        Position控制器里面 add()方法调用model里面insert()完成显示
    b.显示推荐位
        Position控制器里面 index()方法调用model里面select()完成数据库插入
    c.编辑推荐位
        Position控制器里面 edit()方法调用model里面find()完成数据查找，并显示
        提交时,调用common.js里面saveurl跳转到Position控制器add方法,通过save()方法
        调用model里面updateById()完成数据更新
    d.删除推荐位
        点击删除按钮->common.js删除操作->set_status_url->跳转到控制器里面setStatus()
        调用模型里面updateStatusById()完成数据库状态更改
    e.点击更改推荐位状态
        点击状态->common.js里面通过更改状态方法set_status_url->跳转到控制器setStatus()方法
        调用模型里面updateStatusById()完成数据库状态更改

    f. 实现推荐位推送
        content控制器里面index方法->调用position模型里面getNormalPositions()获取正常推荐位内容
        在文章首页编写推送html，
        在common.js实现推送 通过push_url调用
        在文章控制器push(方法)->news模型getNewsByNewsIdIn($newsId) 判断文章id是否存在
        调用(新建的)PositionContent模型里面insert(方法)将数据插入数据库

8.推荐位内容管理 (新建PositioncontentController)
    a.显示推荐位
        D("Position")->getNormalPositions()  获取推荐位数据
        D("PositionContent")->select($data); 获取推荐位内容数据
    同时根据推荐位 来搜索对应显示文章内容  通过传递过来position_id实现搜索功能(上面select()方法)
    同时将positionId传递到view层，实现搜索后，搜索项还在
    如果get到传递过来title

    b.添加推荐位内容(第二种获取方式)
        没有post提交 ： D("Position")->getNormalPositions()，将推荐位信息展示到添加页面
        有post提交 ：通过add()  如果数据验证成功
        D("PositionContent")->insert($_POST) 插入数据库
        如果填写文章id，则缩略图从对应文章获得

    c.编辑推荐位
        下拉菜单选中
        <if condition="$position['id'] eq $vo['position_id']">selected="selected" </if>
        控制器edit()方法通过
        D("PositionContent")->find($id) 获取推荐位内容
        D("Position")->getNormalPositions() 获取推荐位

        编辑提交(公用的common.js)所以到控制器index()接收编辑的id
        跳转到控制器save方法

    d.更改推荐位文章状态(删除和修改)
        将setStatus($data, $models)放到公共模块CommonController
        调用model里面D($models)->updateStatusById存进数据库

        点击删除调用common.js里面删除方法跳转到
    e.推荐位内容排序
        点击排序按钮->调用控制器里面listorder()方法
        D($model)->updateListorderById

9.基本配置 BasicController
    (1.将配置写进缓存，tp自带F方法)
    在index页面里面提交，跳转到控制器里面add(方法),
    提交保存成功后->Application/Runtime/Data/basic_web_config.php

10.用户管理
        a.新建AdminController控制器,调用Admin 模型里面getAdmins(方法)
        b.add（）方法添加管理员
        c.在login控制器通过updateByAdminId()方法来更新管理员最后登录时间
11.用户个人信息管理
        在admin控制器person方法加载用户页面，save方法存储用户个人信心
12.后台首页
    a.今日登陆用户数
    b.文章数量
    c.文章最大阅读数
    d.推荐位数


二：网站前台
    1.需要模块
        a.倾听世界(10)  图文+外链
        b.往期征文(5) 图文+外链
        c.首页轮播图(2) 推荐位查询
        d.文章排行(10) home/common控制器
        e.推荐文章(3)  news查询
        f.
    2.文件路径配置
        index.html放在Home/View/Index下面 js/css/images 和网站index.php入口文件在同一级
    3.从Home/Controller/index控制器里面index方法，
        通过Basic模型，获取网站基本数据
        通过Menu模型，获取网站前端导航分类

        通过PositionContent获取占位符内容，显示各个区域内容
    4.在News模型通过getRank(）获取文章排行,
        在Home/Controller/CommonController里面
    5.错误页面：
        Home/Controller/common控制器的error(方法)
    6.栏目页开发 CatController
        index()获取传过来栏目id
    7.文章详情页开发 DetailController
        D('News')->updateCount($id, $count); 对文章点击数更新
        $news =  D("News")->find($id);   获取文章内容
        通过view(方法实现后台预览)

    8.首页页面静态化处理
        a. 在Index控制器里面调用系统自带（ThinkPHP/Library/Think/Controller.class.php）方法
            buildHtml('index',HTML_PATH,'Index/index'）;
        在配置文件Application/Common/Conf/config.php 里面配置  'HTML_FILE_SUFFIX' => '.html',
        在入口文件index.php配置  define('HTML_PATH', './');

        在Admin/Basic/index.html 添加缓存配置,在BasicController里面cache()更新缓存静态页面
        通过ajax异步实现静态页面更新
        b. 定时任务自动生成静态化页面
        在前台IndexController里面 crontab_build_html(方法)，并在根目录下新建
        cron.php文件(做定时任务)
        在方法里面判断

    9.ajax异步加载计数器数据   (在静态化页面实时加载点击数)
        a.视图层：<span class="news_count node-{$carousel.news_id}" news-id="{$carousel.news_id}">阅读数：{$carousel.count}</span>
        b.新建 public/js.count.js
        c.调用index控制器里面getCount(方法)

    10.数据库备份
        在Admin/Controller/CronController控制器
        php cron.php admin cron dumpmysql

        数据库导出



三：note
    1. 添加文章，然后推送到对应推荐位
    2. 直接添加推荐位内容













