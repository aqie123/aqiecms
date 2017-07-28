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
                <a href="/admin.php"  class="list-group-item <?php echo (getActive($index)); ?>">后台首页</a>
                <!--折叠菜单 开始-->
                <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><a href="<?php echo (getAdminmenuUrl($navo)); ?>"  class="list-group-item <?php echo (getActive($navo["c"])); ?>"><?php echo ($navo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--折叠菜单 结束-->
            </ul>
        </div>
        <div class="col-md-10">
            <div class="page-header">
                <!--路径导航-->
                <ol class="breadcrumb">
                    <li class="active">推荐位管理</li>
                </ol>
            </div>
            <!--按分类查找推荐位    -->
            <!--<div class="row">-->
            <form action="/admin.php" method="get" class="formType">
                <div class="input-group">
                    <span class="input-group-addon">类型</span>
                    <select class="form-control" name="type">
                        <option value="">请选择类型</option>
                        <option value="1" <?php if($type == 1): ?>selected="selected"<?php endif; ?>>后台菜单</option>
                        <option value="0" <?php if($type == 0): ?>selected="selected"<?php endif; ?>>前台菜单</option>
                    </select>
                    <span class="input-group-btn">
                          <button id="sub_data" type="submit" class="btn btn-primary">
                              <i class="glyphicon glyphicon-search"></i>
                          </button>
                    </span>
                </div>
                <input type="hidden" name="c" value="menu"/>
                <input type="hidden" name="a" value="index"/>

            </form>
            <!--</div>-->
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active" >
                    <a href="#">推荐位管理</a>
                </li>
                <li role="presentation">
                    <a href="./admin.php?c=position&a=add">添加推荐位</a>
                </li>
            </ul>
            <form id="singcms-listorder">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>推荐位名称</th>
                        <th>时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($positions)): $i = 0; $__LIST__ = $positions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$position): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($position["id"]); ?></td>
                            <td><?php echo ($position["name"]); ?></td>
                            <td><?php echo (date("Y-m-d H:i",$position["create_time"])); ?></td>
                            <td title="点击开启/关闭"><span  attr-status="<?php if($position['status'] == 1): ?>0<?php else: ?>1<?php endif; ?>"  attr-id="<?php echo ($position["id"]); ?>" class="sing_cursor singcms-on-off" class="singcms-on-off" ><?php echo (getstatus($position["status"])); ?></span></td>
                            <td>
                                <div role="presentation" class="dropdown">
                                    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
                                        操作 <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="singcms-edit" attr-id="<?php echo ($position["id"]); ?>"><a href="javascript:;" >编辑</a></li>
                                        <li class="singcms-del" attr-id="<?php echo ($position["id"]); ?>" attr-message="删除"><a href="javascript:;">删除</a></li>
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
        'edit_url' : '/admin.php?c=position&a=edit',
        'set_status_url' : '/admin.php?c=position&a=setStatus',
        'add_url' : '/admin.php?c=position&a=add',
    }
    $(".singcms-table #sing-add-position-content").on('click',function(){
        var id = $(this).attr('attr-id');
        window.location.href='/admin.php?c=positioncontent&a=index&position_id='+id;
    });
</script>
</body>
</html>