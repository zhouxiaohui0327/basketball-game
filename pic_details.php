<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/26
 * Time: 14:55
 */
$id = $_GET['id'];
require_once "mysql.php";
connectDb();

$query = mysql_query("SELECT * FROM typecho_gallery WHERE gid=$id");
$count_arr = mysql_fetch_array($query);
$image = $count_arr[2];
$name = $count_arr[4];
if($name==""):
    $name="未命名";
endif;
$description =$count_arr[5];
?>



<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图片集 - 奥廷体育</title>
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/picture.css"/>
    <link rel="stylesheet" href="./css/pic_details.css"/>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
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
                    <img src="/usr/themes/aoting/img/logo.png" class="logo" alt="" style="width: 110px" />
                </a>
            </div>
            <nav id="bs-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li> <a href="/index.php">首页</a></li>
                    <li><a href="/index.php/category/news/">新闻中心</a></li>
                    <li><a href="/index.php/game.html">篮球联赛</a></li>
                    <li><a href="/index.php/aoting.html">奥廷体育</a></li>
                    <li><a href="/index.php/contact.html/">联系我们</a></li>
                </ul>
                <div class="search-frame right hidden-sm hidden-md hidden-xs">
                    <form id="search" method="post" action="./" role="search">
                        <input type="text"name="s" class="text left" placeholder="  输入关键词" />
                        <button type="submit" class="sure left" >搜索</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="picWrap w-800">
    <div class="pic_Box">
            <div style="width: 95%;margin:0 auto">
                <p class="name"><?php echo $name;?></p>
                <img src="<?php echo $image;?>" alt=""/>
                <p class="description"><?php echo $description;?></p>
            </div>
    </div>
</div>
<!-- 多说评论框 start -->
<div class="ds-thread w-800" data-thread-key="<?php echo $id;?>" data-title="<?php echo $name;?>" data-url="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];;?>"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
    var duoshuoQuery = {short_name:"zjoteam"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
<!-- 多说公共JS代码 end -->
</body>
</html>