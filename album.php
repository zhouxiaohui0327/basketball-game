<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/27
 * Time: 11:01
 */
?>
<?php
require_once "mysql.php";
connectDb();
function get_list($table_name,$sort){
//    if (!isset($_GET['page'])) {
//        $page = 1;
//    } else {
//        $page = $_GET['page'];
//    }
//    $limit=16;
//    $startCount = ($page - 1) * $limit;
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
if(!isset($_GET['id'])){
    $id=1;
}else{
    $id=$_GET['id'];
}
$order = $_GET['order'];
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
<!--    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="css/idangerous.swiper.css"/>
    <link rel="stylesheet" href="./css/album.css"/>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="js/idangerous.swiper-2.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".pic").click(function(){
                $(".above ,.bottom").slideToggle("fast");
            })
        });
        function returnBtn(){
           var id = $(".above_left").attr("id");
            window.location.href="picture_mobile.php?id="+id;
        }
    </script>
    <script>
        $(document).ready(function(){
            var order = $(".swiper-wrapper").attr("order");
            var newOrder = Number(order)+1;
            var winwidth = $(window).width();
            var Y = "translate3d("+ -Number(winwidth)*newOrder+"px,0px,0px)";
            $(".swiper-wrapper").css({"-webkit-transform":Y})
        })
    </script>
</head>
<body>
<div class="above">
    <div class="above_left" id="<?php echo $id;?>" onclick="returnBtn()"></div>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper" order="<?php echo $order;?>">
        <?php foreach($pic_list as $row):?>
            <div class="swiper-slide">
                <table style="height:100%;width: 100%" cellspacing="0" cellpadding="0" >
                    <tbody>
                    <tr>
                        <th style="height:100%;width: 100%"><img width="100%" src="<?php echo $row['image'] ?>" class="pic" alt=""/></th>
                    </tr>
                    </tbody>
                </table>
                <div class="bottom">
                    <div class="bottom_inner">
                        <h4><script>
                                var order =$(".bottom").parents(".swiper-slide").index()+1+"/";
                                console.log(order);
                                document.write(order);
                            </script><?php echo $count ;?></h4>
                        <h5><?php echo $row['description'] ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="pagination" style="display: none"></div>
</div>
<script>
    var mySwiper = new Swiper('.swiper-container',{
        pagination: '.pagination',
        paginationClickable: true,
        loop:true
    })
</script>
</body>
</html>