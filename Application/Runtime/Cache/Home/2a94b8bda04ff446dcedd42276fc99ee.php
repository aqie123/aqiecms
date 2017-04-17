<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta property="qc:admins" content="542536566763012535145636" /> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title><?php echo ($config["title"]); ?></title>
        <meta name="keywords" content="<?php echo ($config["keywords"]); ?>" />
        <meta name="description" content="<?php echo ($config["description"]); ?>" />
        <meta name="viewport" content="width=1050" /> 
        <link rel="stylesheet" type="text/css" href="css/common.css?v7.2" /> 
        <link rel="stylesheet" type="text/css" href="css/public.css?v1" /> 
        <link href="./favicon.ico?v=0.1" mce_href="/favicon.ico" rel="icon" type="image/x-icon" />
        <link href="./favicon.ico?v=0.1" mce_href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <script type="text/javascript" src="js/jq.js?v4.1"></script> 
        <script type="text/javascript" src="js/ss.js?v4.8"></script> 
        <script type="text/javascript">
            function getBrowser()
            {
                var OsObject = "";
                if (navigator.userAgent.indexOf("MSIE") > 0) {
                    var browser = navigator.appName;
                    var b_version = navigator.appVersion;
                    var version = b_version.split(";");
                    var trim_Version = version[1].replace(/[ ]/g, "");
                    if (browser == "Microsoft Internet Explorer" && trim_Version == "MSIE6.0")
                    {
                        return("IE6");
                    }
                    else if (browser == "Microsoft Internet Explorer" && trim_Version == "MSIE7.0")
                    {
                        return("IE7");
                    }
                    else if (browser == "Microsoft Internet Explorer" && trim_Version == "MSIE8.0")
                    {
                        return("IE8");
                    }
                    else if (browser == "Microsoft Internet Explorer" && trim_Version == "MSIE9.0")
                    {
                        return("IE9");
                    }
                    else if (browser == "Microsoft Internet Explorer" && trim_Version == "MSIE10.0")
                    {
                        return("IE10");
                    }
                }
                if (navigator.userAgent.indexOf("Firefox") > 0) {
                    return "Firefox";
                }
                if (navigator.userAgent.indexOf("Chrome") > 0) {
                    return "Chrome";
                }
                if (navigator.userAgent.indexOf("Opera") > 0) {
                    return "Opera";
                }
                if (navigator.userAgent.indexOf("Safari") > 0) {
                    return "Safari";
                }
                return 'Others';
            }
            (function() {
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
                vars.cookieUMessage = 'HASMESSAGE' + vars.userid;
                vars.voteBlankColor = new Array('#5DBBEF', '#95E62A', '#CC1CD9', '#FFCD10', '#F79395');
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
                        <a href="./"><img src="images/logo.jpg" alt="享笑网LOGO 征文比赛 有奖征文" /></a>
                    </div>
                    <!--首页导航开始-->
                    <div class="pb-iblock pb-fl pb-nav"> 
                        <ul> 
                            <li <?php if($result['catId'] == 0): ?>class="active"<?php endif; ?>><a href="index.html">首页</a></li>
                            <?php if(is_array($navs)): $i = 0; $__LIST__ = array_slice($navs,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($vo['menu_id'] == $result['catId']): ?>class="active"<?php endif; ?>>
                                <a href="./index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>">
                                    <?php echo ($vo["name"]); ?>
                                </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul> 
                    </div> 
                    <div class="pb-iblock pb-fr pb-oths"> 
                        <a class="nmt" href="javascript:void(0);" onclick="Sys.commStat(2);
              commonLib.SetHome(this);">设为首页</a>
                        <a class="nmt" href="index.html" rel="sidebar" onclick="Sys.commStat(1);
              commonLib.addFavorite();">收藏我们</a> 
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
                        <form action="" onsubmit="W.tips('暂未开放搜索功能，敬请期待!');
              Sys.commStat(6);
              return false;"> 
                            <input class="pb-search-btn" type="submit" value="" /> 
                            <input class="pb-search" type="text" /> 
                        </form> 
                    </div> 
                </div> 
                <!-- 公共头部 --> 
                <!-- 当前页面内容 --> 
                <link rel="stylesheet" type="text/css" href="css/jquery.slideBox.css" /> 
                <link rel="stylesheet" type="text/css" href="css/index.css?v2" /> 
                <div class="pb-main pb-mt10">
                    <!--首页轮播图-->
                    <div id="bSlideBox" class="pb-main slideBox"> 
                        <ul class="items">
                            <?php if(is_array($result['topPicNews'])): $i = 0; $__LIST__ = $result['topPicNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carousel): $mod = ($i % 2 );++$i;?><li>
                                <a target="_blank"  href="./index.php?c=detail&id=<?php echo ($carousel["news_id"]); ?>">
                                    <img src="<?php echo ($carousel["thumb"]); ?>" alt="首页轮播图" />
                                </a>
                                <span class="news_count node-<?php echo ($carousel["news_id"]); ?>" news-id="<?php echo ($carousel["news_id"]); ?>">
                                    阅读数：<?php echo ($carousel["count"]); ?>
                                </span>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul> 
                    </div> 
                </div> 
                <script>
                    $(document).ready(function() {
                        $('#bSlideBox').slideBox({
                            duration: 0.7,
                            //direction : 'top',
                            easing: 'linear',
                            delay: 5,
                            hideClickBar: true,
                            clickBarRadius: 10
                        });
                    });
                </script> 
                <div style="clear:both;"></div> 
                <div class="pb-main pb-mt20"> 
                    <h3 class="idx-t1"> <a href="news.html" class="pb-clr1">征文比赛</a> </h3> 
                    <div class="idx-line1"> 
                    </div> 
                    <div class="idx-ycwz-1 pb-mt20 pb-after-clear">
                        <!--征文比赛左侧大图-->
                        <a href="./index.php?c=detail&id=<?php echo ($result['solicit'][0]['news_id']); ?>" class="pb-iblock pb-fl">
                            <img src="<?php echo ($result['solicit'][0]['thumb']); ?>" class="pb-block" alt="" />
                        </a>
                        <div class="pb-iblock pb-fl d1"> 
                            <h6><a href="news_detail.html?-10" class="pb-clr1 pb-size-big">本期征文比赛 | <span>你如何看待高中生恋爱</span></a></h6> 
                            <div class="pb-line2 pb-mt5" style="border:0;"> 
                            </div> 
                            <ul>
                                <!--本期征文比赛三个小图-->
                                <?php if(is_array($result['solicit'])): $k = 0; $__LIST__ = array_slice($result['solicit'],1,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="pb-mt20">
                                    <a href="./index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>">
                                        <img src="<?php echo ($vo["thumb"]); ?>" class="pb-fl" alt=""  width="67px"/>
                                    </a>
                                    <a href="./index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>" class="pb-fl rt"><?php echo ($vo["title"]); ?></a>
                                    <p class="pb-iblock"><?php echo ($vo["description"]); ?></p>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul> 
                        </div> 
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
                    </div> 
                    <div class="idx-ycwz-1 pb-mt50 pb-after-clear"> 
                        <div class="idx-last-board pb-fl"> 
                            <a href="news_detail.html?-9"><img src="images/essay_10001_2c1098e1a2.jpg" class="pb-block" alt="上期征文比赛,上期有奖征文, 开学与青春或梦想" /></a> 
                            <span class="pb-size-normal pb-block pb-mt15">上期专题</span> 
                            <a class="pb-size-normal pb-mt5 pb-block" href="news_detail.html?-9">开学与青春或梦想</a> 
                        </div> 
                        <div class="pb-iblock pb-fl d1"> 
                            <h6><a href="news_detail.html?-9" class="pb-clr1 pb-size-big">推荐文章 | <span>完整榜单</span></a></h6>
                            <div class="pb-line2 pb-mt5"> 
                            </div> 
                            <ul class="pb-mt15 rank">
                                <?php if(is_array($result['recommend'])): $k = 0; $__LIST__ = $result['recommend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recommend): $mod = ($k % 2 );++$k;?><li class="pb-iblock pb-mt8"> <span class="pb-fl pb-mt10 no"><?php echo ($k); ?></span>
                                    <a href="/user-10348">
                                        <dl class="pb-fl"> 
                                            <dt>
                                                <img src="<?php echo ($recommend["thumb"]); ?>" class="pb-block" alt="参加征文比赛作者,小红楼" />
                                            </dt> 
                                            <dd>
                                                <?php echo ($result['copyfrom'][$recommend['copyfrom']]); ?>
                                            </dd> 
                                        </dl>
                                    </a>
                                    <a href="./index.php?c=detail&id=<?php echo ($recommend["news_id"]); ?>" class="pb-fl pb-block pb-size-normal title">
                                        <?php echo ($recommend["title"]); ?>
                                    </a>
                                    <span class="pb-fr dollar">$30</span>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul> 
                        </div> 
                        <div class="pb-main-side pb-iblock pb-after-clear pb-fr"> 
                            <h6 class="pb-clr1 pb-size-big">文章排行</h6>
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
                    </div> 
                    <h3 class="idx-t2 pb-mt50 pb-clr1">往期征文</h3> 
                    <div class="pb-line2 pb-mt5"> 
                    </div> 
                    <div class="idx-wqzt pb-mt15 pb-after-clear"> 
                        <ul class="idx-wqzt pb-mt10 pastessay">
                            <?php if(is_array($result['pastessay'])): $i = 0; $__LIST__ = $result['pastessay'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> 
                                <dl> 
                                    <dt> 
                                        <a href="<?php echo ($vo["url"]); ?>">
                                            <img alt="毕业季 校园时代 七月校园 离别气息" src="<?php echo ($vo["thumb"]); ?>" />
                                        </a>
                                    </dt> 
                                    <dd>
                                        <a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a>
                                    </dd> 
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul> 
                    </div> 
                    <h3 class="idx-qtsj-t pb-mt50"> 
                        <div class="inx-qtsj-line pb-fr"></div> 
                        <div class="inx-qtsj-line pb-fl"></div>
                        <a href="pic.html">
                            <span class="chn">倾听世界</span>
                            <br />
                            <span class="eng">LISTEN TO THE WORLD</span>
                        </a>
                    </h3>
                    <div class="idx-qtsj pb-mt20 pb-after-clear"> 
                        <ul class=" listenWorld">
                            <?php if(is_array($result['listenWorld'])): $i = 0; $__LIST__ = $result['listenWorld'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo ($re["url"]); ?>">
                                    <img src="<?php echo ($re["thumb"]); ?>" class="pb-block" style="width:200px;" alt="美女,清纯唯美写真合集" />
                                </a>
                                <table class="pb-opac70"> 
                                    <tbody>
                                        <tr> 
                                            <td class="tle"><?php echo ($re["title"]); ?></td>
                                            <td class="num">+35</td> 
                                        </tr> 
                                    </tbody>
                                </table>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul> 
                    </div> 
                    <div style="clear:both;"></div> 
                    <h3 class="idx-t1 pb-mt50"> <a href="laugh.html" class="pb-clr1">每日一笑</a> </h3> 
                    <div class="idx-line1"> 
                    </div> 
                    <div class="idx-mryx pb-mt20 pb-after-clear"> 
                        <div class="d1 pb-fl"> 
                            <img src="images/b_smile_left.jpg" class="pb-fl" alt="最新搞笑段子,每日一笑" /> 
                            <a href="laugh.html" class="tle pb-fl pb-clr1">搞笑段子&nbsp;&nbsp;|&nbsp;&nbsp; <span class="pb-clr2">更多</span></a> 
                            <ul class="pb-mt15 pb-fl pb-size-normal"> 
                                <li> <span>.</span> <a href="/jokes-5-4758">家里的电要交电费</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4757">要把学校当成自己家</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4756">别耽误老娘我做生意</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4755">那是我妈</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4754">东邪西毒</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4753">马上过年了</a> </li> 
                            </ul> 
                        </div> 
                        <div class="d1 pb-fl d1-2"> 
                            <img src="images/b_smile_left1.jpg" class="pb-fl" alt="本周搞笑段子排行榜,笑话排,每日一笑" /> 
                            <a href="/jokes?priority=pop" class="tle pb-fl pb-clr1">笑话排行&nbsp;&nbsp;|&nbsp;&nbsp; <span class="pb-clr2">更多</span></a> 
                            <ul class="pb-mt15 pb-fl pb-size-normal"> 
                                <li> <span>.</span> <a href="/jokes-5-4749">看朋友们晒从小到大的照片，</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4754">东邪西毒</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4750">昨天晚上</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4751">什么是尴尬</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4752">前几天我在火车站等车</a> </li> 
                                <li> <span>.</span> <a href="/jokes-5-4753">马上过年了</a> </li> 
                            </ul> 
                        </div> 
                        <div class="d2 pb-fr"> 
                            <img class="pb-block" src="images/b_smile_right.jpg" alt="少儿不宜搞笑段子,超级内涵搞笑段子，校园搞笑段子,生活中的搞笑段子" /> 
                            <table class="pb-mt10"> 
                                <tbody>
                                    <tr> 
                                        <td><a href="laugh.html">各种口味</a></td> 
                                        <td><a href="/jokes-2">少儿不宜</a></td> 
                                        <td><a href="/jokes-4">超级内涵</a></td> 
                                    </tr> 
                                    <tr> 
                                        <td><a href="/jokes-1">图片笑话</a></td> 
                                        <td><a href="/jokes-5">贴近生活</a></td> 
                                        <td><a href="/jokes-3">校园趣闻</a></td> 
                                    </tr> 
                                </tbody>
                            </table> 
                        </div> 
                    </div> 
                    <div style="clear:both;"></div> 
                    <h3 class="idx-t1 pb-mt50"> <a href="http://www.lanrenzhijia.com/"" class="pb-clr1">叫醒耳朵</a> </h3> 
                    <div class="idx-line1"> 
                    </div> 
                    <div class="idx-jxed pb-mt20 pb-after-clear"> 
                        <div class="pb-fl d1"> 
                            <ul> 
                                <li> <img class="pb-fl" src="images/b_jxed_l1.jpg" alt="把耳朵叫醒,爱他们的时候我们像条狗,扣子" /> 
                                    <dl class="pb-fl"> 
                                        <dt>
                                            <a href="pic_detail.html?show/241">爱他们的时候我们像条狗</a>
                                        </dt> 
                                        <dd class="author">
                                            主播：扣子
                                        </dd> 
                                        <dd class="cnt">
                                            所有的女朋友里，我最喜欢老夏。因为她和我像，高贵冷艳俗气，俗到骨子里。我们总是在夏天刚开始的那几天去富民路和巨鹿路路口的酒吧。那有一棵著名大 ... 
                                        </dd> 
                                        <dd class="ap"> 
                                            <span class="auplayer" id="auplayer_241" f="L3B1YmxpYy9wbGF5ZXIvMjAxNTA1L2F0ZHNod214dGcubXAz&gt;" a="扣子" t="爱他们的时候我们像条狗"></span> 
                                        </dd> 
                                    </dl> </li> 
                                <li class="pb-mt40"> <img class="pb-fl" src="images/b_jxed_l2.jpg" alt="把耳朵叫醒,爱你的第九年,这是你不必详知的事情,NJ楚璇" /> 
                                    <dl class="pb-fl"> 
                                        <dt>
                                            <a href="pic_detail.html?show/240">爱你的第九年,这是你不必详知的事情</a>
                                        </dt> 
                                        <dd class="author">
                                            主播：NJ楚璇
                                        </dd> 
                                        <dd class="cnt">
                                            爱你的第九年,这是你不必详知的事情人生是一场旅行，你路过我，我路过你，若有缘可结伴一生；无缘，只能各自修行，各自向前，然后在错过的时光年轮里 ... 
                                        </dd> 
                                        <dd class="ap"> 
                                            <span class="auplayer" id="auplayer_240" f="L3B1YmxpYy9wbGF5ZXIvMjAxNTA1L2FpbmlkZWRpaml1bmlhbi5tcDM=&gt;" a="NJ楚璇" t="爱你的第九年,这是你不必详知的事情"></span> 
                                        </dd> 
                                    </dl> </li> 
                            </ul> 
                        </div> 
                        <div class="d2 pb-fr"> 
                            <dl> 
                                <dt> 
                                    <a href="/weekly-1-2"> <img src="images/post_10001_c1be1e419b.jpg" alt="征文比赛,有奖征文,第二期：回首这匆匆十年" /> </a> 
                                </dt> 
                                <dd class="term pb-size-big">
                                    第二期
                                </dd> 
                                <dd class="tle">
                                    <a href="/weekly-1-2">第二期：回首这匆匆十年</a>
                                </dd> 
                            </dl> 
                        </div> 
                    </div> 
                    <script>
                        $(document).ready(function() {
                            AudioPlayer.setup("js/player.swf", {
                                width: 300,
                                initialvolume: 100
                            });
                            $(".auplayer").each(function() {
                                AudioPlayer.embed($(this).attr('id'), {
                                    soundFile: $(this).attr('f'),
                                    titles: $(this).attr('t'),
                                    artists: $(this).attr('a'),
                                    autostart: "no",
                                    loop: "no"
                                });
                            });
                        });
                    </script> 
                </div> 
                <script type="text/javascript" src="js/jquery.slideBox.js"></script> 
                <script type="text/javascript" src="js/ap.js"></script> 
                <script>
                     $(document).ready(function() {
                         $(".idx-qtsj li").hover(function() {
                             $(this).find('table').stop().animate({'bottom': '-40px'}, 500);
                         }, function() {
                             $(this).find('table').stop().animate({'bottom': '0px'}, 500);
                         });
                     });
                </script> 
                <!-- 当前页面内容结束 --> 
            </div> 
            <!-- 公共尾部 --> 
            <div style="clear:both;"></div> 
            <div class="pb-footer"> 
                <div class="pb-footer-wp"> 
                    <div class="pb-main pb-footer-cnt pb-size-small"> 
                        <span class="pb-fl">&copy; 2017-2020 aqie 版权-没有</span>
                        <ul class="pb-fr"> 
                            <li><a href="http://www.whzcwl.com.cn" target="_blank">aqie网络</a></li>
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
        <script src="./Public/js/count.js"></script>
        <script type="text/javascript" language="javascript">
               $(document).ready(function() {
                   $(".pb-ucenter").bind('mouseenter', function() {
                       $(this).find('ul').stop().slideDown('fast');
                       Sys.clearFlicker('uMessageCenter');
                   }).bind('mouseleave', function() {
                       $(this).find('ul').stop().slideUp('fast');
                   });

                   $("#goTopButton").click(function() {
                       Sys.scrollTo($('body'));
                       Sys.commStat(33);
                   });
                   if (vars.browser != 'IE6') {
                       var w_w = parseInt($("body").width());
                       var obj = $("#goTopButton");
                       $(window).scroll(function() {
                           if ($(this).scrollTop() > 500) {
                               if (!isNaN(w_w) && w_w > 0) {
                                   obj.css('left', (Math.ceil((w_w - 1050) / 2) + 1050 + 10) + "px");
                               }
                               obj.fadeIn();
                           } else {
                               obj.fadeOut();
                           }
                       });
                   }
                   Sys.hide51();
               });
        </script>  
    </body>
</html>