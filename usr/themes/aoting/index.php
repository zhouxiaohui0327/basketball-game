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
        #banner {position:relative; width:397px; height:200px;float:left;}
        #banner ul {position:absolute;list-style-type:none;filter: Alpha(Opacity=80);z-index:1002;
            margin:0; padding:0; bottom:10px;   left: 103%;width: 160px;}
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
        #banner_list a{position:absolute;}
        #banner_text_list a{position:absolute;color:white;font-size:14px;line-height:20px}
    </style>


<div class="wrap">
    <div class="big-pic">
        <img src="<?php $this->options->themeUrl(); ?>img/big-pic.png" alt=""/>
    </div>
    <div class="content">
        <div class="w-800">
            <div class="content_above">
                <div class="logo_pic left">

                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                    <p>联赛排行榜 /</p>
                    <p>Rarking list</p>
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




                <div class="list_wrap">
                    <div class="participants_list left">
                        <p>本科男篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                            <li>分数</li>
                        </ul>
                        <ul class="list_text list">
                            <li>1</li>
                            <li>浙大</li>
                            <li>100</li>
                        </ul>
                    </div>
                    <div class="participants_list left">
                        <p>本科女篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                            <li>分数</li>
                        </ul>
                        <ul class="list_text list">
                            <li>1</li>
                            <li>浙大</li>
                            <li>100</li>
                        </ul>
                    </div>
                    <div class="participants_list left">
                        <p>专科男篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                            <li>分数</li>
                        </ul>
                        <ul class="list_text list">
                            <li>1</li>
                            <li>浙大</li>
                            <li>100</li>
                        </ul>
                    </div>
                    <div class="participants_list left">
                        <p>专科女篮</p>
                        <ul class="list_nav list">
                            <li>排名</li>
                            <li>学校</li>
                            <li>分数</li>
                        </ul>
                        <ul class="list_text list">
                            <li>1</li>
                            <li>浙大</li>
                            <li>100</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_middle">
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
                <div class="every_pic left" style="background: url(<?php $this->options->themeUrl(); ?>img/IMG_6635.jpg)-45px 0;background-size: 272px 203px;">
                </div>
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
                <div class="every_pic left" style="background: url(<?php $this->options->themeUrl(); ?>img/IMG_6611.jpg)-45px 0;background-size: 280px 203px;">
                </div>
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
                <div class="every_pic left" style="background: url(<?php $this->options->themeUrl(); ?>img/8124891_165010261000_2.jpg)-67px -30px;background-size: 389px 254px;">
                </div>
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
                <div class="every_pic left" style="background: url(<?php $this->options->themeUrl(); ?>img/51b29b42da227.jpg)-45px 0;background-size: 294px 203px;">

                </div>
                <div class="every_pic left">
                    <img src="<?php $this->options->themeUrl(); ?>img/game_logo.png" alt=""/>
                </div>
            </div>
        </div>
    </div>


<?php $this->need('footer.php'); ?>
