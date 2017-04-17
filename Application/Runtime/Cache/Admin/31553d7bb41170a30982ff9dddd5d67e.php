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
            <a href="1.html" class="navbar-brand wow">AQIE ADMIN</a>
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
                <li class="active">
                    <a href="./admin.php?c=menu">
							<span class="glyphicon glyphicon-th">
							</span>&nbsp;&nbsp;菜单管理
                    </a>
                </li>
                <li>
                    <a href="./admin.php?c=basic">
							<span class="glyphicon glyphicon-tag">
							</span>&nbsp;&nbsp;基本管理
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo getLoginUsername();?>
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
                    <a href="./admin.php?c=login&a=loginout">
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
                    <li><a href="/admin.php?c=menu">菜单管理</a></li>
                    <li class="active">添加</li>
                </ol>
            </div>

            <form id="singcms-form">
                <div class="form-group">
                    <label for="title">标题</label>
                    <input type="text" name="name" id="title" class="form-control">
                </div>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="type" id="inlineRadio1" value="1" checked="checked"> 后台菜单
                </label>
                <label class="radio-inline">
                    <input type="radio" name="type" id="inlineRadio2" value="0"> 前台栏目
                </label>
                <br>
                <br>
                <div class="form-group">
                    <label for="m">模块名</label>
                    <input type="text" name="m" id="m" class="form-control">
                </div>
                <div class="form-group">
                    <label for="c">控制器</label>
                    <input type="text" name="c" id="c" class="form-control">
                </div>
                <div class="form-group">
                    <label for="f">方法</label>
                    <input type="text" name="f" id="f" class="form-control">
                </div>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="status" id="on" value="1" checked> 状态开启
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="off" value="0"> 状态关闭
                </label>
                <br>
                <br>
                <div class="form-group">
                    <button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
                </div>

            </form>

        </div>
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
        'save_url' : '/admin.php?c=menu&a=add',
        'jump_url' : '/admin.php?c=menu'
    }
</script>
</body>
</html>