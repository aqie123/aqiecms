<?php if (!defined('THINK_PATH')) exit(); $navs = D("Menu")->getAdminMenus(); ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.black.css">
    <link rel="stylesheet" type="text/css" href="/public/css/admin.css">
</head>
<body>
<nav class="navbar navbar-default ">
    <div class="container">
        <!-- 小屏幕导航按钮和logo BEGIN-->
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="./admin.php" class="navbar-brand wow">AQIE ADMIN</a>
        </div>

        <!-- 小屏幕导航按钮和logo END -->

        <!-- 导航 BEGIN-->
        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
                <li>
                    <a href="./admin.php">
                        <span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;后台首页
                    </a>
                </li>
                <li >
                    <a href="./admin.php?c=admin">
							<span class="glyphicon glyphicon-user">
							</span>&nbsp;&nbsp;用户管理
                    </a>
                </li>
                <li>
                    <a href="./admin.php?c=content">
							<span class="glyphicon glyphicon-list-alt">
							</span>&nbsp;&nbsp;文章管理
                    </a>
                </li>
                <li>
                    <a href="./admin.php?c=menu">
							<span class="glyphicon glyphicon-th">
							</span>&nbsp;&nbsp;菜单管理
                    </a>
                </li>
                <li  class="active">
                    <a href="./admin.php?c=basic">
							<span class="glyphicon glyphicon-tag">
							</span>&nbsp;&nbsp;基本管理
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        admin
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="3.html"><span class="glyphicon glyphicon-move"></span>&nbsp;&nbsp;前台首页</a></li>
                        <li><a href="3.html"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;个人主页</a></li>
                        <li><a href="3.html"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;个人设置</a></li>
                        <li><a href="3.html"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;账户中心</a></li>
                        <li><a href="3.html"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;我的收藏</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#bbs">
							<span class="glyphicon glyphicon-off">
							</span>退出
                    </a>
                </li>
            </ul>
        </div>


    </div>
</nav>
<!-- 导航 END-->

<!-- userlist开始 -->
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                <a href="./admin.php"  class="list-group-item <?php echo (getActive($index)); ?>">后台首页</a>
                <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><a href="<?php echo (getAdminmenuUrl($navo)); ?>" class="list-group-item <?php echo (getActive($navo["c"])); ?>"><?php echo ($navo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

        <div class="col-md-10">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="active set">基本配置</li>
                    <li class="active cache">缓存配置</li>
                </ol>
            </div>
        </div>
        <!--基本配置-->
        <div class="col-md-10">
            <form id="singcms-form">
                <div class="form-group">
                    <label for="title">站点标题</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo ($vo["title"]); ?>">
                </div>

                <div class="form-group">
                    <label for="keywords">站点关键词</label>
                    <input type="text" name="keywords" id="keywords" class="form-control" value="<?php echo ($vo["keywords"]); ?>">
                </div>
                <div class="form-group">
                    <label for="content">站点描述</label>
                    <textarea class="form-control" id="content" rows="6" name="description"><?php echo ($vo["description"]); ?></textarea>
                </div>

                <label class="radio-inline">
                    <input type="radio" name="dumpmysql" id="SmartCopy" value="1" checked> 自动备份数据库
                </label>
                <label class="radio-inline">
                    <input type="radio" name="dumpmysql" id="discopy" value="0"> 不自动备份数据库
                </label>
                <br>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="cacheindex" id="autoload" value="1" checked> 自动生成首页缓存
                </label>
                <label class="radio-inline">
                    <input type="radio" name="cacheindex" id="disload" value="0"> 不自动生成首页缓存
                </label>
                <div class="form-group">
                    <button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
                </div>

            </form>
        </div >
        <!--基本配置 结束-->

        <!--缓存配置-->
        <div class="col-md-10" style="display: none">
            <br>

            <div class="form-group">
                <label  class="col-sm-2 control-label">更新首页缓存:</label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-default" id="cache-index">确定更新</button>
                </div>
            </div>
        </div>
        <!--缓存配置 结束-->
    </div>
</div>

<!-- footer开始 -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Copyright&nbsp;©&nbsp;2017-2020&nbsp;&nbsp;www.aqie.com&nbsp;&nbsp;
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- footer结束 -->


<script src="/public/js/jquery-3.1.1.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/public/js/admin/common.js"></script>
<script type="text/javascript">
    var SCOPE = {
        'save_url' : '/admin.php?c=basic&a=add',
        'jump_url' : '/admin.php?c=basic'
    };

    /**
     * 基本配置，缓存配置切换
     */
    $('.active:nth-of-type(2)').click(function(){

        $('.col-md-10:nth-of-type(4)').show();
        $('.col-md-10:nth-of-type(3)').hide();
        $(this).removeClass('active');
        $('ol li:nth-of-type(1)').addClass('active');
    });
    $('.active:nth-of-type(1)').click(function(){

        $('.col-md-10:nth-of-type(3)').show();
        $('.col-md-10:nth-of-type(4)').hide();
        $(this).removeClass('active');
        $('ol li:nth-of-type(2)').addClass('active');
    });

    /**
     * 点击更新缓存，ajax异步更新缓存
     */
    $("#cache-index").click(function(){

        var url = 'index.php?c=index&a=build_html';
        var jump_url = './admin.php?c=basic&a=index';
        var postData = {};

        $.post(url, postData,function(result){
            if(result.status==1) {
                // 成功生成静态页面
                return dialog.success(result.message,jump_url);
            }else if(result.status==0) {
                return dialog.error(result.message);
            }

        },"JSON");
    });

</script>
</body>
</html>