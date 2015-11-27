<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/21
 * Time: 13:08
 */

function is_mobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
    $is_mobile = false;
    foreach ($mobile_agents as $device) {
        if (stristr($user_agent, $device)) {
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}
if( is_mobile() ){
    header("Location:/picture_mobile.php");                     //判断是否是手机用户
}

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
?>



<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图片集 - 奥廷体育</title>
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/picture.css"/>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--    <script>-->
<!--        $(document).ready(function(){-->
<!--            $(".main_nav_wrap ul li").click(function(){-->
<!--                $(this).addClass("active");-->
<!--                $(this).siblings(".active").removeClass("active");-->
<!--                var x= $(this).index();-->
<!--                $(".picBox").siblings(".on").removeClass("on");-->
<!--                $(".picBox").eq(x).addClass("on");-->
<!--            })-->
<!--        })-->
<!--    </script>-->
    <script>
        $(document).ready(function(){
            var id = $(".navBar_grey ul").attr("id");
            $(".navBar_grey ul li").eq(id-1).addClass("active");
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
        <div class="navBar_grey" style="width: 100%;">
            <ul id="<?php echo $id ;?>">
                <li><a href="/picture.php?id=1">2015男子甲A组</a></li>
                <li><a href="/picture.php?id=2">2015女子甲组</a></li>
                <li><a href="/picture.php?id=3">2015男子甲B组</a></li>
                <li><a href="/picture.php?id=4">2015男子乙B组</a></li>
                <li><a href="/picture.php?id=5">2015男子乙A组</a></li>
                <li><a href="/picture.php?id=6">2015女子乙组</a></li>
                <li><a href="/picture.php?id=7">2015丙丁组</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="pic_wrap w-800">
    <div class="picBox on">
        <?php foreach($pic_list as $row):?>
            <div class="pic_box">
                <div class="pic_box_img">
                    <a href="/pic_details.php?id=<?php echo $row['gid']; ?>"><img src="<?php echo $row['image'] ?>" alt=""/></a>
                </div>
                <div class="pic_box_text">
                    <a href="/pic_details.php?id=<?php echo $row['gid'];?>"><?php echo $row['description'] ?></a>
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