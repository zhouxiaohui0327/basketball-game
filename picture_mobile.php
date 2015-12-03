<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/25
 * Time: 14:21
 */

?>

<?php
require_once "mysql.php";
connectDb();
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$limit = 16;
$count=mysql_query("SELECT * FROM typecho_gallery");
$totalNumber = mysql_num_rows($count);
$totalPage=ceil($totalNumber/$limit);
$b = 3 ;
function get_list($table_name,$sort){
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $limit=16;
    $startCount = ($page - 1) * $limit;
    $list = array();
    $query = mysql_query("SELECT * FROM $table_name WHERE sort=$sort limit $startCount ,$limit");
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
if(!isset($_GET['id'])){
    $id=1;
}else{
    $id=$_GET['id'];
}

$pic_list=get_list('typecho_gallery',$id);
$query = mysql_query("SELECT * FROM typecho_gallery WHERE sort=$id");
$count = mysql_num_rows($query);
?>



<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图片集 - 奥廷体育</title>
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/picture.css"/>
    <link rel="stylesheet" href="css/picture_mobile.css"/>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            var id = $(".navBar_grey ul").attr("id");
            $(".navBar_grey ul li").eq(id-1).addClass("active");
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".pic_box img").click(function(){
                var id=$(this).attr("id");
                var order=$(this).parents(".pic_box").index();
                window.location.href="/album.php?id="+id+"&order="+order;
            });
            $(".pic_box_text").click(function(){
                var id = $(this).attr("id");
                var order =$(this).parents(".pic_box").index();
                window.location.href="/album.php?id="+id+"&order="+order;
            })
        })
    </script>
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

<h2 style="text-align: center;margin-bottom: 20px;color:#F09b00">2015年浙江省大学生篮球联赛</h2>
<div class="main_nav_wrap">
    <div class="w-800">
        <div class="navBar_grey" style="width: 100%;overflow:auto;">
            <ul id="<?php echo $id ;?>">
                <li><a href="/picture_mobile.php?id=1">2015男子甲A组</a></li>
                <li><a href="/picture_mobile.php?id=2">2015女子甲组</a></li>
                <li><a href="/picture_mobile.php?id=3">2015男子甲B组</a></li>
                <li><a href="/picture_mobile.php?id=4">2015男子乙B组</a></li>
                <li><a href="/picture_mobile.php?id=5">2015男子乙A组</a></li>
                <li><a href="/picture_mobile.php?id=6">2015女子乙组</a></li>
                <li><a href="/picture_mobile.php?id=7">2015丙丁组</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="pic_wrap w-800">
    <div class="picBox">
        <?php foreach($pic_list as $row):?>
            <div class="pic_box" >
                <div class="pic_box_img">
                    <a><img src="<?php echo $row['image'] ?>" id="<?php echo $row['sort']; ?>" alt=""/></a>
                </div>
                <div class="pic_box_text" id="<?php echo $row['sort']; ?>">
                    <a><?php echo $row['description'];?></a>
                </div>
                <div class="pic_box_text_right">
                    <script>
                            var order = $(".pic_box img").parents(".pic_box").index();
                            document.write(order+1);
                    </script>/<?php echo $count;?></div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="nav_wrap">
        <nav>
            <ul class="pagination">
                <?php
                if($page<=1){
                    ?>
                    <li>
                        <a aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php
                }else {
                    ?>
                    <li>
                        <a href="picture.php?id=<?php echo $id;?>&page=<?php echo $page - 1;?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php
                }
                ?>
                <!--                <li>-->
                <!--                    <a href="picture.php?page=--><?php //echo $page - 1;?><!--" aria-label="Previous">-->
                <!--                        <span aria-hidden="true">&laquo;</span>-->
                <!--                    </a>-->
                <!--                </li>-->
                <?php
                for ($i=$page;$i<=$page+$b&&$i<=$totalPage;$i++) {
                    ?>
                    <li><a href="picture.php?id=<?php echo $id;?>&page=<?php echo $i;?>"><?php echo $i ;?></a></li>
                <?php
                }
                ?>
                <?php
                if($page>=$totalPage){
                    ?>
                    <li>
                        <a aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        <span class="total"><?php echo "共".$totalPage."页";?></span>
                    </li>
                <?php
                }else {
                    ?>
                    <li>
                        <a href="picture.php?id=<?php echo $id;?>&page=<?php echo $page + 1;?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
</body>
</html>