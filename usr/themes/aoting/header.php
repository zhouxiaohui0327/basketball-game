<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php $this->options->themeUrl(); ?>img/1234.png" media="screen" />
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t(' %s '),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

	<!-- 使用url函数转换相关路径 -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.staticfile.org/normalize/2.1.3/normalize.min.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('index.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('news.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('details.css'); ?>">

	<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/usr/themes/aoting/carousel.js"></script> 


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
		<div class="container w-800">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="../" class="navbar-brand">
					<img src="<?php $this->options->themeUrl(); ?>img/logo.png" class="logo" alt="" width="110px"/>
				</a>
			</div>
			<nav id="bs-navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li> <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
					<li><a href="/index.php/category/news/"><?php _e('新闻中心'); ?></a></li>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
					<?php while($pages->next()): ?>
					<li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
				<div class="search-frame right hidden-sm hidden-md hidden-xs">
					<form id="search" method="post" action="./" role="search">
						<input type="text"name="s" class="text left" placeholder="  <?php _e('输入关键词'); ?>" />
						<button type="submit" class="sure left" ><?php _e('搜索'); ?></button>
					 </form>
				</div>
			</nav>
		</div>
    </div>
</div>
    





    
