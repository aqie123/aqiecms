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
    <link rel="stylesheet" href="/Public/css/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/uploadify.css">
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
                <a href="./admin.php"  class="list-group-item <?php echo (getActive($index)); ?>">后台首页</a>
                <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><a href="<?php echo (getAdminmenuUrl($navo)); ?>" class="list-group-item <?php echo (getActive($navo["c"])); ?>"><?php echo ($navo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="/admin.php?c=content">文章管理</a></li>
                    <li class="active">添加文章</li>
                </ol>
            </div>

            <form id="singcms-form">
                <div class="form-group">
                    <label for="title">标题</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="small_title">短标题</label>
                    <input type="text" name="small_title" id="small_title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_upload">缩略图</label>
                    <input id="file_upload"  type="file" multiple="true" >
                    <img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
                    <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="">
                </div>
                <div class="form-group">
                    <label>标题颜色：</label>
                    <select class="form-control" name="title_font_color">
                        <option value="">==请选择颜色==</option>
                        <?php if(is_array($titleFontColor)): foreach($titleFontColor as $key=>$color): ?><option value="<?php echo ($key); ?>"><?php echo ($color); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>所属栏目</label>
                    <select class="form-control" name="catid">
                        <?php if(is_array($webSiteMenu)): foreach($webSiteMenu as $key=>$sitenav): ?><option value="<?php echo ($sitenav["menu_id"]); ?>"><?php echo ($sitenav["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>来源</label>
                    <select class="form-control" name="copyfrom">
                        <?php if(is_array($copyfrom)): foreach($copyfrom as $key=>$cfrom): ?><option value="<?php echo ($key); ?>"><?php echo ($cfrom); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="editor_singcms">内容</label>
                    <textarea class="input js-editor form-control" id="editor_singcms" name="content" rows="15" ></textarea>
                </div>
                <div class="form-group">
                    <label for="description">描述</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="keywords">关键字</label>
                    <input type="text" name="keywords" id="keywords" class="form-control">
                </div>
                <label class="radio-inline">
                    <input type="radio" name="recommend" id="off" value="0" checked> 不推荐
                </label>
                <label class="radio-inline">
                    <input type="radio" name="recommend" id="on" value="1"> 推荐
                </label>
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
<script src="/public/js/admin/image.js"></script>
<!--引入第三方图片上传插件-->
<script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>
<!--引入文本编辑器-->
<script src="/Public/js/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript">
    var SCOPE = {
        'save_url' : '/admin.php?c=content&a=add',
        'jump_url' : '/admin.php?c=content',
        'ajax_upload_image_url' : './admin.php?c=image&a=ajaxuploadimage',
        'ajax_upload_swf' : './Public/js/party/uploadify.swf'
    };

    // 6.2
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor_singcms',{
            uploadJson : '/admin.php?c=image&a=kindupload',
            afterBlur : function(){this.sync();}   //
        });
    });
</script>
</body>
</html>