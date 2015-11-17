<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<style>.header{
        position: absolute;top: 40px;z-index:1;
    }
    @media screen and (max-width:414px){
        .header{top:10px}
    }
</style>
<?php $this->need('header.php'); ?>
<div class="news_content_wrap">
    <div class="news_content">
        <img src="<?php $this->options->themeUrl(); ?>img/new-bg.png" class="news-text-bg" alt=""/>
    </div>
</div>

<div class="news-text-wrap">
    <div class="news-text-nav">
        <div class="w-800">
            <ul>
                <li><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页');?></a></li>
                <li><a href="/index.php/category/news/"><?php _e('>新闻中心');?></a></li>
<!--                <li>>--><?php //$this->title() ?><!--</li>-->
            </ul>
        </div>
        <div class="details_content w-800">
<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta">
<!--            <li itemprop="author" itemscope itemtype="http://schema.org/Person">--><?php //_e('作者: '); ?><!--<a itemprop="name" href="--><?php //$this->author->permalink(); ?><!--" rel="author">--><?php //$this->author(); ?><!--</a></li>-->
<!--            <li>--><?php //_e('时间: '); ?><!--<time datetime="--><?php //$this->date('c'); ?><!--" itemprop="datePublished">--><?php //$this->date('F j, Y'); ?><!--</time></li>-->
<!--            <li>--><?php //_e('分类: '); ?><!----><?php //$this->category(','); ?><!--</li>-->
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
<!--        <p itemprop="keywords" class="tags">--><?php //_e('标签: '); ?><!----><?php //$this->tags(', ', true, 'none'); ?><!--</p>-->
    </article>

    

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div><!-- end #main-->

</div>
    </div>
</div>









<style>
        .header .header-wrap{
            background-color: rgba(240, 248, 255, 0.56);}
        /*.w-800{*/
            /*margin: 0 0;*/
            /*float: right;*/
            /*margin-right: 10%;}*/
        @media screen and (max-width:600px){
            .details_content p{margin-left: 30px;margin-right: 30px}
            .details_content h3{margin-left: 30px;}
            .post-near{margin-left: 40px;margin-right: 40px;}
            .news-text-wrap .news-text-nav{line-height: 20px}
            .news-text-wrap .news-text-nav ul li{line-height: 40px}
            .details_content h1{font-size: 18px;margin-left: 10px;margin-right: 10px;}
        }
</style>

<?php $this->need('footer.php'); ?>
