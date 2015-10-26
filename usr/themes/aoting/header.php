<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    
    <link rel="stylesheet" href="http://cdn.staticfile.org/normalize/2.1.3/normalize.min.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('index.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('news.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('details.css'); ?>">
    
    <script src="usr/themes/aoting/jquery-1.8.3.min.js"></script>
   
    <script src="usr/themes/aoting/carousel.js"></script> 
   


    <!--[if lt IE 9]>
    <script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->


<div class="header">
    <div class="header-wrap">
        <div class="w-800">
            <div class="nav-bar">
                <div class="logo_wrap left">
                    <img src="<?php $this->options->themeUrl(); ?>img/logo.png" class="logo" alt=""/>
                </div>
                <div class="nav left id="nav-menu"">
                    <ul>
                       <li> <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
                      
                       <li><a href="/index.php/category/news/"><?php _e('新闻中心'); ?></a></li>
                    
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                    <?php endwhile; ?>
                   </ul>
                </div>
                <div class="search-frame right">
                    <form id="search" method="post" action="./" role="search">
                        <input type="text"name="s" class="text left" placeholder="  <?php _e('Search'); ?>" />
                        <button type="submit" class="sure left" ><?php _e('搜索'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    



<?php if ($this->is('category') || $this->is('post')): ?>
<style type="text/css">
#mycategory{width:100%;height:180px;display:block;background:url(<?php $this->options->themeUrl('images/category' . $this->categories[0]['order'] . '.jpg'); ?>) no-repeat;border-top:1px solid #CFD9DA;margin-bottom:3px;border-top:0;}
.mycategory_txt{position:relative;left:600px;top:100px;font-size:16px;font-weight:bold;color:#fefefe;font-family: \5FAE\8F6F\96C5\9ED1, sans-serif;}
</style>
<div id="mycategory">
   <div class="mycategory_txt"><?php echo $this->categories[0]['name']; ?></div>
</div>
<?php endif; ?>
    
