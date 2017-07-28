<?php if (!defined('THINK_PATH')) exit(); $navs = D("Menu")->getAdminMenus(); ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>
    <!-- <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.black.css">
    <link rel="stylesheet" type="text/css" href="/public/css/admin.css">
    <style>
        form{
            padding:0;
        }
    </style>
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
                <li class="active">
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
                        admin
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="3.html"><span class="glyphicon glyphicon-move"></span>&nbsp;&nbsp;前台首页</a></li>
                        <li><a href="3.html"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;个人主页</a></li>
                        <li><a href="3.html"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;个人设置</a></li>
                        <li><a href="3.html"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;账户中心</a>
                        </li>
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
                <a href="/admin.php" class="list-group-item <?php echo (getActive($index)); ?>">后台首页</a>
                <!--折叠菜单 开始-->
                <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><a href="<?php echo (getAdminmenuUrl($navo)); ?>" class="list-group-item <?php echo (getActive($navo["c"])); ?>"><?php echo ($navo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--折叠菜单 结束-->
            </ul>
        </div>
        <div class="col-md-10">
            <div class="page-header">
                <!--路径导航-->
                <ol class="breadcrumb">
                    <li class="active">推荐位内容管理</li>
                </ol>
            </div>
            <div class="row">
                <form action="./admin.php" method="get">
                    <div class="col-lg-6">
                        <div class=" input-group">
                            <span class="input-group-addon">推荐位</span>
                            <select class="form-control" name="position_id">
                                <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>"
                                    <?php if($position['id'] == $positionId): ?>selected="selected"<?php endif; ?> >
                                        <?php echo ($position["name"]); ?>
                                    </option><?php endforeach; endif; ?>
                            </select>
                        </div>
                        <input type="hidden" name="c" value="positioncontent"/>
                        <input type="hidden" name="a" value="index"/>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="输入文章标题来搜索" name="title" value="<?php echo ($title); ?>">
                            <span class="input-group-btn">
                            <button id="sub_data" class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                          </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </form>
            </div><!-- /.row -->
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a>推荐位内容管理</a>
                </li>
                <li role="presentation">
                    <a href="./admin.php?c=positioncontent&a=add">添加推荐位内容</a>
                </li>
                <li class="pull-right">
                    <button  id="button-listorder" type="button" class="btn btn-primary dropdown-toggle" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span>更新排序</button>
                </li>
            </ul>
            <form id="singcms-listorder">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>排序</th>
                        <th>id</th>
                        <th>标题</th>
                        <th>时间</th>
                        <th>封面图</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($contents)): $i = 0; $__LIST__ = $contents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><tr>
                            <td><input size=4 type='text' name='listorder[<?php echo ($content["id"]); ?>]' value="<?php echo ($content["listorder"]); ?>"/>
                            </td>
                            <td><?php echo ($content["id"]); ?></td>
                            <td><?php echo ($content["title"]); ?></td>
                            <td><?php echo (date("Y-m-d H:i",$content["create_time"])); ?></td>
                            <td><?php echo (isThumb($content["thumb"])); ?></td>
                            <td title="点击开启/关闭"><span attr-status="<?php if( $content['status'] == 1): ?>0
                                <?php else: ?>
                                1<?php endif; ?>" attr-id="<?php echo ($content["id"]); ?>" class="sing_cursor singcms-on-off" ><?php echo (getstatus($content["status"])); ?></span></td>
                            <td>
                                <div role="presentation" class="dropdown">
                                    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
                                        操作 <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="singcms-edit" attr-id="<?php echo ($content["id"]); ?>"><a href="javascript:;">编辑</a>
                                        </li>
                                        <li class="singcms-del" attr-id="<?php echo ($content["id"]); ?>" attr-message="删除"><a
                                                href="javascript:;">删除</a></li>
                                        <li><a href="#">更改状态</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
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
        'edit_url' : '/admin.php?c=positioncontent&a=edit',
        'set_status_url' : '/admin.php?c=positioncontent&a=setStatus',
        'add_url' : '/admin.php?c=positioncontent&a=add',
        'listorder_url' : '/admin.php?c=positioncontent&a=listorder',
    }
</script>
</body>
</html>