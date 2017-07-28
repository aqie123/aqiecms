<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class IndexController extends CommonController
{
    function index($type='')
    {
        // 获取文章排行 @
        $rankNews = $this->getRank();

        // 获取首页轮播图数据 @
        $topPicNews = D("PositionContent")->select(array('status'=>1,'position_id'=>3),2);

        // 征文比赛中图+三个小图
        $solicit = D("PositionContent")->select(array('status'=>1,'position_id'=>4),4);

        // 获取推荐文章 @
        $recommend = M("News")->where('status=1 and thumb<>"" and recommend=1')
                              ->order('create_time desc,countnum desc')
                              ->limit(3)->select();
          //dump(M('News')->getLastSql());die;

        // $rankNews = D("News")->select(array('status'=>1,'thumb'=>array('neq','')),3);
        // dump(D('News')->getLastSql());die;

        /*$rankNews =  M("News")->where('status=1')
                              ->order('countnum desc')
                              ->limit(3)->select(false);
                              var_dump($rankNews);die; 
                              */ 
                                          

        $copyFrom = C("COPY_FROM");
        //var_dump($copyFrom[0]);die;

        // 往期征文 @
        $pastessay = D("PositionContent")->select(array('status'=>1,'position_id'=>2),5);

        // 倾听世界 @
        $listenWorld = D("PositionContent")->select(array('status'=>1,'position_id'=>1),10);


        // $articleRank = M("News")->where('status=1 and thumb<>""')->order('countnum desc')->limit(8)->select();
        // echo  M("News")->getLastSql();die;  //打印sql语句


        $this->assign('result',array(
            'topPicNews' => $topPicNews,
            'recommend'=>$recommend,
            'rankNews' =>$rankNews,
            'catId' => 0,
            'pastessay'=>$pastessay,
            'listenWorld'=>$listenWorld,
            'copyfrom'=>$copyFrom,
            'solicit'=>$solicit

        ));
        /**
         * 生成静态化页面 调用系统自带方法 buildHtml(）
         */
        if($type == 'buildHtml'){
            $this->buildHtml('index',HTML_PATH,'Index/index');
        }else{
            $this->display();
        }

    }

    /**
     * 这时在上面传type默认是空
     */
    public function build_html(){
        // 调用index方法,并传递type参数
        $this->index('buildHtml');
        return show(1,'首页缓存生成成功');
    }

    /**
     * 定时生成静态化页面   crontab -e 需要linux

     */
    public function crontab_build_html(){
//        echo "aqie";die;
        // 保证文件必须通过cron.php执行的
        if(APP_CRONTAB != 1) {
            die("the_file_must_exec_crontab");
        }
        $result = D("Basic")->select();
        // 没有设置自动生成静态缓存
        if(!$result['cacheindex']) {
            die('系统没有设置开启自动生成首页缓存的内容');
        }
        $this->index('buildHtml');
        // rm -rf index.html

    }


    /**
     * ajax 动态获取首页轮播图文章点击数
     */
    public function getCount(){
        if(!$_POST) {
            return show(0, '没有任何内容');
        }

        $newsIds =  array_unique($_POST);

        try{
            $list = D("News")->getNewsByNewsIdIn($newsIds);
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }

        if(!$list) {
            return show(0, 'notdatas');
        }

        $data = array();
        foreach($list as $k=>$v) {
            // 将文章点击数传递过去
            $data[$v['news_id']] = $v['countnum'];
        }
        return show(1, 'success', $data);
    }


    function test()
    {
        echo "aqie";
        $this->display();
    }
}