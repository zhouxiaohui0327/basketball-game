<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<style>.header{
            position: absolute;top: 40px;z-index:1;
            height: 70px;}

</style>
<?php $this->need('header.php'); ?>
<div class="news_content_wrap">


    <div class="left-slide-nav"  style="position: absolute;z-index:2000">
        <div class="left-above">
            <img class="logo-above" src="<?php $this->options->themeUrl(); ?>img/logo-above.png" alt=""/>
            <img class="logo-text" src="<?php $this->options->themeUrl(); ?>img/logo-text.png" alt=""/>
        </div>
        <div class="left-bottom">
            <ul>
                <li><a href="">公司新闻</a></li>
                <li><a href="">新闻公告</a></li>
                <li><a href="">行业动态</a></li>
                <li><a href="">媒体关注</a></li>
            </ul>
        </div>
    </div>


    <div class="news_content">
        <img src="<?php $this->options->themeUrl(); ?>img/new-bg.png" class="news-text-bg" alt=""/>
    </div>
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


    <div class="col-mb-12 col-8" id="main" role="main" style="overflow:hidden">
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            
          <div class="news-text-content w-800">
     <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
         <ul>
             <li class="left" itemprop="name headline" style="line-height:40px;"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></li>
             <li class="right"><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time></li>
         </ul>

         
     </article>
  </div>












    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"style="text-align:center"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div><!-- end #main -->

</div>


<style>
        .header .header-wrap{
            background-color: rgba(240, 248, 255, 0.56);}
        .w-800{
            margin: 0 0;
            float: right;
            margin-right: 10%;}
</style>

	
	<?php $this->need('footer.php'); ?>
