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
$count = mysql_num_rows($query);
$count_arr = mysql_fetch_array($query);
$image = $count_arr[2];
$name = $count_arr[4];
//if($name==""):
//    $name="未命名";
//endif;
$description =$count_arr[5];
$sort = $_GET["sort"];
$order = $_GET['order'];
$query = mysql_query("SELECT * FROM typecho_gallery WHERE sort=$sort");
$count = mysql_num_rows($query);

function get_list($table_name,$sort){
    $list = array();
    $query = mysql_query("SELECT * FROM $table_name WHERE sort=$sort");
    $count1 = mysql_num_rows($query);

    if ($count1 <= 0) {
        return $list;
    } else {
        for ($i = 0; $i < $count1; $i++) {
            $list[] = mysql_fetch_assoc($query);
        }
        return $list;
    }
}
$pic_list=get_list('typecho_gallery',$sort);
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
    <script src="./js/jquery-2.1.4.js"></script>
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
            <div style="width: 95%;margin:0 auto;position: relative">
                <?php
                if($order>=$count-1):?>
                    <a class="next" order="<?php echo $order;?>" sort="<?php echo $sort;?>"><li></li></a>
                    <a class="prev" order="<?php echo $order;?>" sort="<?php echo $sort;?>" href="javascript:prev()"><li></li></a>
                <?php elseif($order=="0"):?>
                    <a class="next" order="<?php echo $order;?>" sort="<?php echo $sort;?>"href="javascript:next()"><li></li></a>
                    <a class="prev" order="<?php echo $order;?>" sort="<?php echo $sort;?>" ><li></li></a>
                <?php else:?>
                    <a class="next" order="<?php echo $order;?>" sort="<?php echo $sort;?>" href="javascript:next()"><li></li></a>
                    <a class="prev" order="<?php echo $order;?>" sort="<?php echo $sort;?>" href="javascript:prev()"><li></li></a>
                <?php endif;?>

                <p class="name"><?php echo $name;?></p>
                <img src="<?php echo $image;?>" alt=""/>
                <p class="description">
                    <span style="font-size: 18px;color:indianred"><?php echo $order+1;?></span>
                    <span style="font-size: 16px">/</span>
                    <span style="font-size: 15px;margin-right: 20px"><?php echo $count;?></span><?php echo $description;?></p>
<!--                    <p class="next" sort="--><?php //echo $sort;?><!--"  ">xiayiye</p>-->
            </div>
    </div>
</div>
<div class="picBox" style="display: none">
    <?php foreach($pic_list as $row):?>
        <div class="pic_box" id="<?php echo $row['gid']; ?>" >
            <div class="pic_box_img">
                <a><img src="<?php echo $row['image'] ?>" alt=""/></a>
            </div>
            <div class="pic_box_text" id="<?php echo $row['sort']; ?>">
                <?php echo $row['description'] ?>
            </div>
        </div>
    <?php endforeach;?>
</div>
<script>
    $(document).ready(function(){
//        $(".next").click(function(){
//            var sort = $(this).attr("sort");
//            var order = $(this).attr("order");
//            var order = Number(order)+1;
//            var id = $(".pic_box").eq(order+1).attr("id");
//            window.location.href="pic_details.php?id="+id+"&sort="+sort+"&order="+order;
//        })

    });
    function next(){
        var sort = $(".next").attr("sort");
        var order = $(".next").attr("order");
        var order = Number(order)+1;
        var id = $(".pic_box").eq(order+1).attr("id");
        window.location.href="pic_details.php?id="+id+"&sort="+sort+"&order="+order;
    }
    function prev(){
        var sort = $(".prev").attr("sort");
        var order = $(".prev").attr("order");
        var order = Number(order)-1;
        var id = $(".pic_box").eq(order+1).attr("id");
        window.location.href="pic_details.php?id="+id+"&sort="+sort+"&order="+order;
    }


</script>


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