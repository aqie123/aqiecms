<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta property="qc:admins" content="542536566763012535145636" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>栏目列表</title>
    <meta name="keywords" content="<?php echo ($config["keywords"]); ?>" />
    <meta name="description" content="<?php echo ($config["description"]); ?>" />
    <meta name="viewport" content="width=1050" />
    <link rel="stylesheet" type="text/css" href="css/common.css?v7.2" />
    <link rel="stylesheet" type="text/css" href="css/public.css?v1" />
    <link href="./favicon.ico?v=0.1" mce_href="http://www.sharesmile.cn/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="./favicon.ico?v=0.1" mce_href="http://www.sharesmile.cn/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <script type="text/javascript" src="js/jq.js?v4.1"></script>
    <script type="text/javascript" src="js/ss.js?v4.8"></script>
    <script type="text/javascript">
        function getBrowser()
        {
            var OsObject = "";
            if(navigator.userAgent.indexOf("MSIE")>0) {
                var browser=navigator.appName;
                var b_version=navigator.appVersion;
                var version=b_version.split(";");
                var trim_Version=version[1].replace(/[ ]/g,"");
                if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0")
                {
                    return("IE6");
                }
                else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0")
                {
                    return("IE7");
                }
                else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE8.0")
                {
                    return("IE8");
                }
                else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE9.0")
                {
                    return("IE9");
                }
                else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE10.0")
                {
                    return("IE10");
                }
            }
            if( navigator.userAgent.indexOf("Firefox")>0){
                return "Firefox";
            }
            if( navigator.userAgent.indexOf("Chrome")>0){
                return "Chrome";
            }
            if( navigator.userAgent.indexOf("Opera")>0){
                return "Opera";
            }
            if( navigator.userAgent.indexOf("Safari")>0) {
                return "Safari";
            }
            return 'Others';
        }
        (function(){
            vars = {};
            vars.browser = getBrowser();
            vars.hello_ketty = "heimao";
            vars.jsUrl = "http://www.sharesmile.cn/js/";
            vars.homeUrl = 'http://www.sharesmile.cn/';
            vars.siteName = '享笑网 - www.ShareSmile.cn - 享你所想,享你所笑';
            vars.publicUrl = "/public/";
            vars.showgirlUrl = "/user#showgirl";
            vars.userid = '10460';
            vars.username = '416148489@qq.com';
            vars.nickname = '阿斗';
            vars.gender = 0;
            vars.PHPSESSID = "krach1sltrpu5pa9ldu9jen4k2";
            vars.ajaxSubmiting = false;
            vars.sysImageUrl = '/public/system/';
            vars.qingImageUrl = '/public/qing/';
            vars.headImageUrl = '/public/userhead/';
            vars.postImageUrl = '/public/post/';
            vars.essayImageUrl = '/public/essay/';
            vars.jokesImageUrl = '/public/jokes/';
            vars.showgirlImageUrl = '/public/showgirl/';
            vars.photoImageUrl = '/public/photo/';
            vars.commStatUrl = '/Stat/stat';
            vars.cookieUMessage = 'HASMESSAGE'+vars.userid;
            vars.voteBlankColor = new Array( '#5DBBEF', '#95E62A', '#CC1CD9', '#FFCD10', '#F79395');
            var d = new Date();
            vars.todayTimeString = 20160122;
        })();
    </script>
</head>
<body>
<div class="pb-container">
    <div class="pb-container-main pb-after-clear">
        <!-- 公共头部 -->
        <div class="pb-main pb-navwrap pb-after-clear">
            <div class="pb-iblock pb-fl pb-logo">
                <a href="index.html"><img src="images/logo.jpg" alt="享笑网LOGO 征文比赛 有奖征文" /></a>
            </div>
            <div class="pb-iblock pb-fl pb-nav">
                <ul>
                    <li <?php if($result['catId'] == 0): ?>class="active"<?php endif; ?>><a href="./">首页</a></li>
                    <?php if(is_array($navs)): $i = 0; $__LIST__ = array_slice($navs,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($vo['menu_id'] == $result['catId']): ?>class="active"<?php endif; ?>>
                        <a href="./index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>">
                            <?php echo ($vo["name"]); ?>
                        </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="pb-iblock pb-fr pb-oths">
                <a class="nmt" href="javascript:void(0);" onclick="Sys.commStat(2);commonLib.SetHome(this);">设为首页</a>
                <a class="nmt" href="index.html" rel="sidebar" onclick="Sys.commStat(1);commonLib.addFavorite();">收藏我们</a>
                <a class="nmt" href="suggest.html">投诉建议</a> &nbsp;
                <span class="nmt"> | </span>
                <div class="pb-ucenter pb-after-clear">
                    <div id="uMessageCenter">
                        <i class="pb-icons triangle"></i>
                        <a href="/user" id="uSetEntry-head"><img src="images/default.gif" alt="阿斗" /></a>
                        <i class="pb-icons notice pb-hide"></i>
                    </div>
                    <br />
                    <ul>
                        <li><a href="/user" id="uSetEntry"><i class="pb-icons my"></i> 个人中心</a></li>
                        <li><a href="/site/logout"><i class="pb-icons logout"></i> 退出登录</a></li>
                    </ul>
                </div>
                <br />
                <form action="" onsubmit="W.tips('暂未开放搜索功能，敬请期待!');Sys.commStat(6);return false;">
                    <input class="pb-search-btn" type="submit" value="" />
                    <input class="pb-search" type="text" />
                </form>
            </div>
        </div>
        <!-- 公共头部 -->
        <!-- 面包屑 -->
        <div class="pb-main pb-breadcrumbs pb-mt40 pb-size-small">
            <a href="index.html">首页</a> &gt;&gt;
            <a href="news.html">征文比赛</a> &gt;&gt;
            <a>你如何看待高中生恋爱</a>
        </div>
        <!-- 面包屑结束 -->
        <!-- 当前页面内容 -->
        <link rel="stylesheet" type="text/css" href="css/topics.css" />
        <div class="pb-main pb-mt20">
            <!--专题章展示-->
            <div class="topics-main pb-inner-main pb-mt10">
                <div class="head">
                    <h1>【文章分类】</h1>
                    <p class="pb-mt10"> 我搬进鸟的眼睛 经常盯着路过的风 也忘了听猎人的枪声 我爱你 你用半生温柔相濡以沫陪我赌，我又怎么可能让你输。 我爱你 别为了不属于你的观众 演绎你不擅长的人生 反正谢幕后的每次相逢 都有我捧着鲜花 把你拥入怀中！ </p>
                </div>
                <div class="pb-size-small pb-mt15 tool">
                    <span class="">排序方式 : </span>
                    <a href="news_detail.html?-10">时间</a>
                    <a href="news_detail.html?-10?priority=score">评分</a>
                </div>
                <ul class="pb-mt30">
                    <?php if(is_array($result['listNews'])): $i = 0; $__LIST__ = $result['listNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listnews): $mod = ($i % 2 );++$i;?><li>
                        <a href="./index.php?c=detail&id=<?php echo ($listnews["news_id"]); ?>">
                            <img src="<?php echo ($listnews["thumb"]); ?>" class="pb-fl" alt="如果高中生谈恋爱，请善待它,征文比赛，有奖征文" width="180px" height="180px"/>
                        </a>
                        <dl>
                            <dt>
                                <a href="./index.php?c=detail&id=<?php echo ($listnews["news_id"]); ?>"><?php echo ($listnews["title"]); ?></a>
                            </dt>
                            <dd class="pb-mt10">
                                <strong>文章来源</strong> ：
                                <a href="/user-10348"><?php echo ($listnews["copyfrom"]); ?></a>
                            </dd>
                            <dd>
                                <strong>关键字</strong> ： <?php echo ($listnews["keywords"]); ?>
                            </dd>
                            <dd>
                                <strong>投稿正文</strong> ：<?php echo ($listnews["description"]); ?>&middot;&middot;&middot;
                            </dd>
                        </dl>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="pb-mt50 pb-listpage">
                    <?php echo ($result['pageres']); ?>
                </div>
            </div>
            <!--专题章展示 end-->
            <!--右侧我要投稿公共部分-->
            <!--右侧我要投稿公共部分-->
            <div class="pb-iblock pb-fr pb-after-clear pb-main-side">
                <img src="images/icon_tougaoyouqian.jpg" class="pb-block" alt="征文比赛 有奖征文" />
                <h6 class="pb-mt15 pb-clr1 pb-size-big">下期专题</h6>
                <div class="pb-line2 pb-mt5">
                </div>
                <a class="tle pb-mt5" href="news_detail.html?/add">年味为什么越来越淡了</a>
                <div class="pb-line2 pb-mt5">
                </div>
                <h6 class="pb-mt15"> <span class="pb-clr1 pb-size-normal">已投稿 <i class="tougao">2</i></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:Sys.showRuleDiv();" class="pb-clr1 pb-size-small pb-underline">获奖规则</a> </h6>
                <a class="but pb-clr1 pb-size-normal pb-mt15" href="news_detail.html?/add">有奖征文</a>
            </div>
            <!--右侧我要投稿公共部分-->
            <div class="pb-main-side pb-iblock pb-after-clear pb-fr pb-mt40">
                <h6 class="pb-clr1 pb-size-big">征文排行</h6>
                <div class="pb-line2 pb-mt5">
                </div>
                <ul class="pb-mt10 previous-term pb-size-normal">
                    <?php if(is_array($result['rankNews'])): $i = 0; $__LIST__ = $result['rankNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rankNews): $mod = ($i % 2 );++$i;?><li>
                            <span>.</span>
                            <a href="./index.php?c=detail&id=<?php echo ($rankNews["news_id"]); ?>"><?php echo ($rankNews["title"]); ?></a>
                            <div class="pb-line2">
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <!--右侧我要投稿公共部分 end-->
        </div>
        <!-- 当前页面内容结束 -->
    </div>
    <!-- 公共尾部 -->
    <div style="clear:both;"></div>
    <div class="pb-footer">
        <div class="pb-footer-wp">
            <div class="pb-main pb-footer-cnt pb-size-small">
                <span class="pb-fl">&copy; 2017-2020 aqie 版权-没有</span>
                <ul class="pb-fr">
                    <li><a href="http://www.whzcwl.com.cn" target="_blank">啊切网络</a></li>
                    <li><a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2338601847&amp;site=www.sharesmile.cn&amp;menu=yes">版权声明</a></li>
                    <li><a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2338601847&amp;site=www.sharesmile.cn&amp;menu=yes">客服中心</a></li>
                    <li><a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2338601847&amp;site=www.sharesmile.cn&amp;menu=yes">联系我们</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 公共尾部 -->
    <div class="ssretotop" id="goTopButton">
        <div class="SG-sidecont">
            <a style="visibility: visible;" href="javascript:;" id="gotonext"></a>
            <a id="retotop" class="pb-icons" href="javascript:void(0)" style="visibility: visible;" title="点击我 坐飞机到顶部"></a>
            <a href="javascript:;" id="gotopre"></a>
        </div>
    </div>
</div>
<script id="tpl-pb-rule" type="text/x-jsmart-tmpl">
		<img src="images/rule.gif" alt="获奖规则"/>
		<a href="javascript:top.window.location.href='/user#go=cash';" style="position: absolute; cursor:pointer;height: 24px; width: 72px; left: 730px; top: 494px; display:inline-block;background:#fff;opacity:0; filter:alpha(opacity=0);"></a>
	</script>
<script language="javascript" type="text/javascript" src="js/15502332.js"></script>
<noscript>
    <a href="http://www.51.la/?15502332" target="_blank"><img alt="我要啦免费统计" src="images/15502332.asp" style="border:none" /></a>
</noscript>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $(".pb-ucenter").bind('mouseenter', function(){
            $(this).find('ul').stop().slideDown('fast');
            Sys.clearFlicker('uMessageCenter');
        }).bind('mouseleave', function(){
            $(this).find('ul').stop().slideUp('fast');
        });

        $("#goTopButton").click(function(){
            Sys.scrollTo($('body'));
            Sys.commStat(33);
        });
        if( vars.browser != 'IE6'){
            var w_w = parseInt( $("body").width());
            var obj = $("#goTopButton");
            $(window).scroll(function(){
                if($(this).scrollTop() > 500){
                    if( !isNaN(w_w) && w_w > 0){
                        obj.css('left', (Math.ceil((w_w-1050)/2) + 1050 + 10) + "px" );
                    }
                    obj.fadeIn();
                }else{
                    obj.fadeOut();
                }
            });
        }
        Sys.hide51();
    });
</script>
</body>
</html>