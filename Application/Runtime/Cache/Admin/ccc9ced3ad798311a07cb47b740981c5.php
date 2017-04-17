<?php if (!defined('THINK_PATH')) exit(); $navs = D("Menu")->getAdminMenus(); $username = getLoginUsername(); foreach($navs as $k=>$v) { if($v['c'] == 'admin' && $username != 'admin') { unset($navs[$k]); } } $index = 'index'; ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.min.black.css">
    <link rel="stylesheet" type="text/css" href="./public/css/admin.css">
    <style>
        form{
            padding: 0;
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
                <!--左侧菜单导航-->
                <a href="./admin.php"  class="list-group-item <?php echo (getActive($index)); ?>">后台首页</a>
                <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><a href="<?php echo (getAdminmenuUrl($navo)); ?>" class="list-group-item <?php echo (getActive($navo["c"])); ?>"><?php echo ($navo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="col-md-10">
                <div class="page-header">
                <!--路径导航-->
                <ol class="breadcrumb">
                    <li class="active">文章管理</li>
                </ol>
            </div>

            <div class="row">
                <form action="./admin.php" method="get">
                    <div class="col-lg-6">
                        <div class=" input-group">
                            <span class="input-group-addon">栏目</span>
                            <select class="form-control" name="catid">
                                <option value="" selected>前台菜单</option>
                                <!--循环显示前台菜单-->
                                <?php if(is_array($webSiteMenu)): foreach($webSiteMenu as $key=>$menu): ?><option value="<?php echo ($menu["menu_id"]); ?>"
                                    <?php if($menu["menu_id"] == $menuId): ?>selected="selected"<?php endif; ?> >
                                        <?php echo ($menu["name"]); ?> <?php ?>
                                    </option><?php endforeach; endif; ?>
                            </select>
                        </div>
                        <input type="hidden" name="c" value="content"/>
                        <input type="hidden" name="a" value="index"/>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="输入文章标题来搜索" name="title" >
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
                <li role="presentation" class="active" >
                    <a>文章管理</a>
                </li>
                <li role="presentation">
                    <a href="./admin.php?c=content&a=add">添加文章</a>
                </li>
                <li role="presentation" class="pull-right">
                    <!--文章推荐位-->
                    <form class="form-inline">
                        <div class="input-group">
                            <select class="form-control" name="position_id" id="select-push">
                                <option value="0">请选择推荐位进行推送</option>
                                <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>"><?php echo ($position["name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                        <button id="singcms-push" type="button" class="btn btn-primary">推送</button>
                    </form>
                </li>
            </ul>
            <form id="singcms-listorder">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th id="singcms-checkbox-all" width="10"><input type="checkbox"/></th>
                        <th>排序</th>
                        <th>id</th>
                        <th>标题</th>
                        <th>栏目</th>
                        <th>来源</th>
                        <th>封面图</th>
                        <th>时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody  id="aqieContent">
                    <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="checkbox" name="pushcheck" value="<?php echo ($new["news_id"]); ?>"></td>
                            <td><input type="text" size="3" name="listorder[<?php echo ($new["news_id"]); ?>]" value="<?php echo ($new["listorder"]); ?>"></td>
                            <td><?php echo ($new["news_id"]); ?></td>
                            <td><?php echo ($new["title"]); ?></td>
                            <td><?php echo (getCatName($webSiteMenu,$new["catid"])); ?></td>
                            <td><?php echo (getCopyFromById($new["copyfrom"])); ?></td>
                            <td><?php echo (isThumb($new["thumb"])); ?></td>
                            <td><?php echo (date("Y-m-d",$new["create_time"])); ?></td>
                            <td>
                                <!--点击状态在0和1之间变化-->
                                <span  attr-status="<?php if($new['status'] == 1): ?>0<?php else: ?>1<?php endif; ?>"
                                attr-id="<?php echo ($new["news_id"]); ?>" class="singcms-on-off">
                                    <?php echo (getStatus($new["status"])); ?>
                                </span>
                            </td>
                            <td>
                                <div role="presentation" class="dropdown">
                                    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
                                        操作 <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="singcms-edit" attr-id="<?php echo ($new["news_id"]); ?>"><a href="javascript:;" >编辑</a></li>
                                        <li class="singcms-del" attr-id="<?php echo ($new["news_id"]); ?>" attr-message="删除">
                                            <a href="javascript:;">删除</a>
                                        </li>
                                        <li><a href="./index.php?c=detail&a=view&id=<?php echo ($new["news_id"]); ?>" target="_blank">预览</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </form>
            <!-- 分页开始 -->
            <nav class="pull-right">
                <ul class="pagination" id="aqie">
                    <?php echo ($pageres); ?>
                </ul>
            </nav>
            <div>
                <button  id="button-listorder" type="button" class="btn btn-primary dropdown-toggle" >
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>更新排序
                </button>
            </div>
            <br>

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


<script src="./public/js/jquery-3.1.1.min.js"></script>
<script src="./public/js/bootstrap.min.js"></script>
<script src="./Public/js/dialog/layer.js"></script>
<script src="./Public/js/dialog.js"></script>
<script src="./public/js/admin/common.js"></script>
<script type="text/javascript">
    var SCOPE = {
        // 编辑文章
        'edit_url' : '/admin.php?c=content&a=edit',
        // 添加文章
        'add_url' : '/admin.php?c=content&a=add',
        'set_status_url' : '/admin.php?c=content&a=setStatus',
        'sing_news_view_url' : '/index.php?c=view',
        'listorder_url' : '/admin.php?c=content&a=listorder',
        'push_url' : '/admin.php?c=content&a=push',
    }
    $('#aqieContent td:nth-of-type(4)').click(function(){
        alert(1);
    })
</script>
</body>
</html>