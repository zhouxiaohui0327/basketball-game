<?php
/**
 * 这是 Typecho 0.9 自创皮肤
 * 
 * @package Typecho Replica Theme 
 * @author Amos
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
  

<!--轮播style-->
<style type="text/css">
        #banner {position:relative; width:100%;float:left;}
        #banner ul {position:absolute;list-style-type:none;filter: Alpha(Opacity=80);z-index:1002;
            margin:0; padding:0; bottom:10px;   left: 107%;width: 160px;}
        #banner ul li {display: inline-block;
            width: 34px;
            height: 4px;
            background: #fff;
            margin: 0 6px;
            cursor: pointer;}
        #banner ul li span{
            display:none;
        }
        #banner ul li.on { background:red}
        #banner_list a{position:absolute;width:100%;}
        #banner_text_list a{position:absolute;color:white;font-size:14px;line-height:20px;margin-left:2%;margin-right:2%;margin-top:10px;}
        @media screen and (max-width:800px){
            #banner_text_list a{font-size: 8px;line-height: 10px}
            #banner ul{left: 100%;bottom:5px}
            #banner ul li{width:10px}
        }
    </style>


<div class="wrap">
    <div class="big-pic">
        <img src="<?php $this->options->themeUrl(); ?>img/big-pic.jpg" alt=""/>
    </div>
    <div class="content">
        <div class="w-800">
            <div class="content_above">
                <div style="overflow: hidden">
                <div class="logo_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/zuba_logo.png" alt=""/>
                </div>



                <div class="carousel-pic left"><!--                图片轮播-->
                    <div id="banner">
                        <ul>
                            <li class="on"><span>1</span></li>
                            <li><span>2</span></li>
                            <li><span>3</span></li>
                        </ul>
                        <div id="banner_list">
<?php $this->widget('Widget_Archive@index', 'pageSize=3&type=category', 'mid=6')->to($categoryPosts); ?>
            <?php while($categoryPosts->next()): ?>
                <a href="<?php $categoryPosts->permalink(); ?>"><img src="<?php echo thumbnail($categoryPosts->content); ?>"></a>
            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
  

                 <div class="carousel-text left">
                    <div class="carousel-text-head">            <!--新闻轮播-->
                        <p>联赛新闻快讯/ News</p>
                    </div>
                    <div id="banner_text_list">
            
<?php $this->widget('Widget_Archive@index', 'pageSize=3&type=category', 'mid=6')->to($categoryPosts); ?>
            <?php while($categoryPosts->next()): ?>
                <a href="<?php $categoryPosts->permalink(); ?>"><?php echo $categoryPosts->title; ?></a>
            <?php endwhile; ?>
                   </div>
                </div>
                </div>
                <div style="background-color: #b11b34;padding-top: 5px;padding-bottom: 5px">
                    <p style="text-align: center;color:#fff;font-size: 17px;margin-bottom: 0">联赛排行榜 /</p>
                    <p style="text-align: center;color:#fff;font-size: 19px;margin-bottom: 0">Ranking list</p>
                </div>

                <div class="list_wrap">
                    <div class="participants_list left">
                        <p>本科男篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第一名</li>
                            <li title="浙江大学">浙江大学</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第二名</li>
                            <li title="中国计量学院">中国计量学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第三名</li>
                            <li title="宁波工程学院">宁波工程学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第四名</li>
                            <li title="温州大学">温州大学</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第五名</li>
                            <li title="树人大学">树人大学</li>
                        </ul>
                    </div>
                    <div class="participants_list left">
                        <p>本科女篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第一名</li>
                            <li title="浙江理工大学">浙江理工大学</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第二名</li>
                            <li title="浙江大学">浙江大学</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第三名</li>
                            <li title="浙江树人大学">浙江树人大学</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第四名</li>
                            <li title="温州大学">温州大学</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第五名</li>
                            <li title="浙江警察学院">浙江警察学院</li>
                        </ul>

                    </div>
                    <div class="participants_list left">
                        <p>专科男篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第一名</li>
                            <li title="浙江工业职业技术学院">浙江工业职业技术学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第二名</li>
                            <li title="浙江育英职业技术学院">浙江育英职业技术学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第三名</li>
                            <li title="浙江经济职业技术学院">浙江经济职业技术学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第四名</li>
                            <li title="浙江商业职业技术学院">浙江商业职业技术学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第五名</li>
                            <li title="浙江纺织服装职业技术学院">浙江纺织服装职业技术学院</li>
                        </ul>

                    </div>
                    <div class="participants_list left">
                        <p>专科女篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第一名</li>
                            <li title="浙江经济职业技术学院">浙江经济职业技术学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第二名</li>
                            <li title="绍兴职业技术学院">绍兴职业技术学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第三名</li>
                            <li title="浙江纺织服装职业技术学院">浙江纺织服装职业技术学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第四名</li>
                            <li title="浙江旅游职业学院">浙江旅游职业学院</li>
                        </ul>
                        <ul class="list_text list">
                            <li>第五名</li>
                            <li title="浙江广厦建设职业技术学院">浙江广厦建设职业技术学院</li>
                        </ul>
                    </div>
                </div>
            </div>
            <table class="content_table" style="width: 100%;position: relative" cellspacing="0" cellpadding="0">
                <tr>
                    <th class="th_red">
                        <div class="th_red_above">
                            <a href=""><p>Star library</p><p>联赛球星库</p></a>
                        </div>
                        <div class="th_red_bottom">
                            <a href="">
                                <p>浙江省大学生篮球联赛球员信息简介</p>
                            </a>
                        </div>
                    </th>
                    <th  bgcolor="#E6E5E2">
                        <img src="<?php $this->options->themeUrl(); ?>img/icon_11.png" alt="" style="width:50%"/>
                    </th>
                    <th><img src="<?php $this->options->themeUrl(); ?>img/pic1.jpg" style="width: 100%;display: block" alt=""/></th>
                    <th bgcolor="#E6E5E2"><a href=""><img class="clickImg" src="<?php $this->options->themeUrl(); ?>img/basketball.png" alt="" /></a><p class="click_text" style="color:#B21C33">点击查看更多球星库信息</p></th>
                </tr>
                <tr>
                    <th bgcolor="#E6E5E2">
                        <div class="th_gray_above">
                            <a href="/index.php/category/video/"><p>Video</p><p>球场掠影</p></a>
                        </div>
                        <div class="th_gray_bottom">
                            <a href="/index.php/category/video/">
                                <p>浙江省大学生篮球联赛赛程视频</p>
                            </a>
                        </div>
                    </th>
                    <th bgcolor="#E6E5E2"><img src="<?php $this->options->themeUrl(); ?>img/pic2.jpg" style="width: 100%;display: block" alt=""/></th>
                    <th bgcolor="#E6E5E2">
                        <div class="th_gray_above">
                            <a href=""><p style="color:#6f706c;">Sports products</p><p style="color:#6f706c;">运动产品</p></a>
                        </div>
                        <div class="th_gray_bottom">
                            <a href="">
                                <p>点击了解运动器械，康复器材</p>
                            </a>
                        </div>
                    </th>
                    <th><img src="<?php $this->options->themeUrl(); ?>img/pic3.png" style="width: 100%;display: block" alt=""/></th>
                </tr>
                <tr>
                    <th style="background-color:#005088"><a href="/picture.php"><img class="clickImg" src="<?php $this->options->themeUrl(); ?>img/photo.png" alt="" /></a><p class="click_text" style="color:white">点击查看更多联赛图片信息</p></th>
                    <th bgcolor="#E6E5E2">
                        <div class="th_gray_above">
                            <a href="/game.php"><p style="color:#6f706c;">Files</p><p style="color:#6f706c;">联赛数据库</p></a>
                        </div>
                        <div class="th_gray_bottom" >
                            <a href="/game.php">
                                <p>查看每场比赛数据统计，了解球员赛场状态</p>
                            </a>
                        </div>
                    </th>
                    <th><img src="<?php $this->options->themeUrl(); ?>img/pic4.jpg" style="width: 100%;display: block" alt=""/></th>
                    <th bgcolor="#E6E5E2">
                        <div class="th_gray_above">
                            <a href=""><p style="color:#6f706c;">Registration</p><p style="color:#6f706c;">培训班报名</p></a>
                        </div>
                        <div class="th_gray_bottom">
                            <a href="">
                                <p>中小学生篮球培训，专业的教练搭配科学的课程打造篮球小少年</p>
                            </a>
                        </div>
                    </th>
                </tr>
            </table>





			<div class="content_below">
                <div class="yellow_box_wrap">

<!--                    <div class="left-side left">-->
<!--                        <div class="left-side-img left">-->
<!--                            <img src="--><?php //$this->options->themeUrl(); ?><!--img/code.png"  alt=""/>-->
<!--                        </div>-->
<!--                        <div class="left-side-text left">-->
<!--                            <p>关注官方微信</p>-->
<!--                            <p>获取更多咨询</p>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="left-side left">
                        <ul>
                            <li class="first">关于我们</li>
                            <li>服务保障</li>
                            <li><a href="/index.php/contact.html">联系我们</a></li>
                            <li>加入我们</li>
                        </ul>
                        <ul>
                            <li class="number-first">奥廷体育服务热线：</li>
                            <li class="number"><i>0571-87611126</i></li>
                        </ul>
                        <ul>
                            <li class="first">友情链接：<a href="http://www.zjedu.gov.cn/default.html">浙江省教育厅</a> &nbsp;&nbsp;<a href="http://www.zjsports.gov.cn/">浙江省体育局</a></li>
                        </ul>
                    </div>
                    <div class="right-side right">
                        <div class="right-side-img left">
                            <img src="<?php $this->options->themeUrl(); ?>img/code.jpg"  alt=""/>
                        </div>
                        <div class="right-side-text left">
                            <p>关注官方微信</p>
                            <p>获取更多咨询</p>
                        </div>
                    </div>

<!--                    <div class="right-side left">-->
<!--                        <div class="contact">-->
<!--                            <p>地址：</p>-->
<!--                            <p style="width: 80%;text-align: center;font-size: 13px">杭州市江干区民心路华润大厦1103室(万象城西面)</p>-->
<!--                        </div>-->
<!--                        <div class="contact">-->
<!--                            <p>电话：</p>-->
<!--                            <p style="width: 80%;text-align: center;font-size: 13px">0571-87611126</p>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>


<?php $this->need('footer.php'); ?>
