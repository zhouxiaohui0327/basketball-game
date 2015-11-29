<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<?php $this->need('header.php'); ?>
<div class="news_content_wrap">

<?php if($this->category == "video") : ?>
    <div class="news_content">
        <img src="<?php $this->options->themeUrl(); ?>img/bg1.jpg" class="news-text-bg" alt=""/>
    </div>
<?php else: ?>
    <div class="news_content">
        <img src="<?php $this->options->themeUrl(); ?>img/video_bg_yellow.jpg" class="news-text-bg" alt=""/>
    </div>
<?php endif; ?>
<!--    <div class="news_content">-->
<!--        <img src="--><?php //$this->options->themeUrl(); ?><!--img/new-bg.png" class="news-text-bg" alt=""/>-->
<!--    </div>-->
</div>
<div class="news-text-wrap">
    <div class="news-text-nav">
        <div class="w-800">

            <ul>
                <li><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页');?></a></li>
                <li>><?php $this->archiveTitle(array(

            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></li>
            </ul>
        </div>
    </div>



   <div class="w-800">
       <div class="col-mb-12 col-8" id="main" role="main" style="overflow:hidden">
           <?php if($this->category !== "video") : ?>
           <div class="left-slide-nav hidden-xs hidden-sm left" >
               <!--div class="left-above">
            <img class="logo-above" src="<?php $this->options->themeUrl(); ?>img/aotinglogo.png" alt=""/>
        </div-->
               <div class="left-bottom">
                   <ul>
                       <li><a href="">公司新闻</a></li>
                       <li><a href="/index.php/category/sport/">体坛新闻</a></li>
                       <li><a href="/index.php/category/ZUBA/">ZUBA新闻</a></li>
                   </ul>
               </div>
           </div>
           <?php endif; ?>
           <?php if ($this->have()): ?>
               <?php while($this->next()): ?>

                   <div class="news-text-content">
                       <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                           <div class="row">
                               <div class="col-xs-8 col-md-9 title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
                               <div class="col-xs-4 col-md-3 time"><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time></div>
                           </div>
                       </article>
                   </div>
               <?php endwhile; ?>
           <?php else: ?>

               <article class="post">
                   <h2 class="post-title"style="text-align:center"><?php _e('没有找到内容'); ?></h2>
               </article>
           <?php endif; ?>


       </div><!-- end #main -->
       <div class="w-800" style="margin-top: 40px"><?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></div>
   </div>
</div>

<!--style>
        .header .header-wrap{
            background-color: rgba(240, 248, 255, 0.68);}
        .w-800{
            margin: 0 0;
            float: right;
            width: 58%;
            margin-right: 8%;
            min-width: 300px;
        }
</style>
<style>.header{
        position: absolute;top: 40px;z-index:1;
    }
    @media screen and (max-width:1350px){
        .header{top:10px}
        .logo_wrap{display: none}
        .nav{width:75%}
    }
    @media screen and (max-width:1120px){
        .header .header-wrap .w-800 .nav-bar ul li a{font-size: 18px}
        .header .header-wrap .w-800 .nav-bar .search-frame input{width: 65%}
    }
    @media screen and (max-width:970px){
        .w-800{margin-right:4%;width:70%}
        .left-slide-nav{left:4%}
    }
    @media screen and (max-width:810px){
        .header .header-wrap .w-800 .nav-bar ul li a{font-size: 15px;line-height: 50px}
        .header .header-wrap .w-800 .nav-bar .search-frame{margin-top: 13px}
        .header .header-wrap .w-800 .nav-bar .search-frame input{width: 60%}
        .w-800{margin-right:2%;width:75%}
        .left-slide-nav{left:2%}
        .left-slide-nav .left-bottom ul li a{font-size: 18px}
    }
    @media screen and (max-width:721px){
        .nav{width: 100%}
        .header .header-wrap .w-800 .nav-bar ul li a{font-size: 15px;line-height: 50px}
        .header .header-wrap .w-800 .nav-bar .search-frame{margin-top: 13px}
        .header .header-wrap .w-800 .nav-bar .search-frame input{width: 60%}
        .w-800{margin-right:2%;width:75%}
        .left-slide-nav{left:2%;width: 13%}
        .left-slide-nav .left-bottom ul li a{font-size: 15px;line-height: 50px}
        .left-slide-nav .left-bottom ul{margin-top: 10px;margin-bottom: 50px}
        .left-slide-nav .left-above .logo-above{margin-top: 20px;margin-bottom: 10px}
        .time{display:none}
    }
    @media screen and (max-width:640px){
        .w-800{margin-right:0;width:75%}
        .left-slide-nav{left:2%}
        .left-slide-nav .left-bottom ul li a{font-size: 12px;line-height: 40px}
    }
    @media screen and (max-width:500px){
        .left-slide-nav .left-bottom ul li a{font-size: 10px}
        .left-slide-nav .left-bottom ul{margin-top: 10px;margin-bottom: 40px}
        .left-slide-nav{padding:0 1px;width: 15%;}
        .header .header-wrap .w-800 .nav-bar ul li a{font-size: 13px;line-height: 30px}
        .news-text-content ul li{text-indent:0}
    }
    @media screen and (max-width:430px){
        .w-800{min-width: 200px;width:80%}
        .header .header-wrap .w-800 .nav-bar ul li{margin-left: 2%}
        .header .header-wrap .w-800 .nav-bar .search-frame{margin:0 auto}
    }
    @media screen and (max-width:374px){
        .w-800{width:77%}
        .header .header-wrap .w-800 .nav-bar ul li{margin-left: 12%}
        .header .header-wrap .w-800 .nav-bar ul li a{line-height: 25px}
        .header .header-wrap .w-800 .nav-bar .search-frame{margin:0 auto}
        .news-text-content ul li{line-height: 30px;}
        .news-text-content ul li a{font-size: 11px}
    }
</style-->
	
	<?php $this->need('footer.php'); ?>
