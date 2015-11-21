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
                <li>><?php $this->title() ?></li>
            </ul>
        </div>
    </div>
<div class="details_content w-800">
   <div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
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
        .details_content h2{font-size: 17px}
        @media screen and (max-width:600px){
            .details_content p{margin-left: 40px;margin-right: 40px}
            .details_content h3{margin-left: 40px;}
            .details_content h2{margin-left: 20px;margin-right: 20px;font-size: 18px}
        }

</style>


<?php $this->need('footer.php'); ?>
