<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/21
 * Time: 13:08
 */

//if(strpos($_SERVER['HTTP_ACCEPT'],'wap')!==false)     //判断是否是手机浏览器访问
//{header("Location:/picture_mobile.php");}
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
$pic1_list=get_list('typecho_gallery','1');
$pic2_list=get_list('typecho_gallery','2');
$pic3_list=get_list('typecho_gallery','3');
$pic4_list=get_list('typecho_gallery','4');
$pic5_list=get_list('typecho_gallery','5');
$pic6_list=get_list('typecho_gallery','6');
$pic7_list=get_list('typecho_gallery','7');
?>



<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图片集 - 奥廷体育</title>
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./picture.css"/>
    <script src="jquery-2.1.4.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".main_nav_wrap ul li").click(function(){
                $(this).addClass("active");
                $(this).siblings(".active").removeClass("active");
                var x= $(this).index();

                $(".picBox").siblings(".on").removeClass("on");
                $(".picBox").eq(x).addClass("on");
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

<!--<h2 style="text-align: center;margin-bottom: 20px;color:#F09b00">2015年浙江省大学生篮球联赛</h2>-->
<div class="main_nav_wrap">
    <div class="w-800">
        <ul>
            <li class="active">2015男子甲A组</li>
            <li>2015女子甲组</li>
            <li>2015男子甲B组</li>
            <li>2015男子乙B组</li>
            <li>2015男子乙A组</li>
            <li>2015女子乙组</li>
            <li>2015丙丁组</li>
        </ul>
    </div>
</div>
<div class="pic_wrap w-800">
    <div class="picBox on">
        <?php foreach($pic1_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <img src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="pic_box_text">
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="picBox">
        <?php foreach($pic2_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <img src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="pic_box_text">
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="picBox">
        <?php foreach($pic3_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <img src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="pic_box_text">
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="picBox">
        <?php foreach($pic4_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <img src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="pic_box_text">
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="picBox">
        <?php foreach($pic5_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <img src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="pic_box_text">
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="picBox">
        <?php foreach($pic6_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <img src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="pic_box_text">
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="picBox">
        <?php foreach($pic7_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <img src="<?php echo $row['image'] ?>" alt=""/>
                </div>
                <div class="pic_box_text">
                    <p><?php echo $row['description'] ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="nav_wrap">
        <nav>
            <ul class="pagination">
                <?php
                if($page<=$totalPage){
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
                        <a href="picture.php?page=<?php echo $page - 1;?>" aria-label="Previous">
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
                    <li><a href="picture.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
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
                        <a href="picture.php?page=<?php echo $page + 1;?>" aria-label="Next">
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