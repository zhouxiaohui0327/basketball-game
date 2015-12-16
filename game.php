<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/12/14
 * Time: 12:53
 */
header("Content-type: text/html; charset=utf-8");
require_once "mysql.php";
connectDb();
//$con = mysql_query("SELECT * FROM game order by id desc");
if(isset($_GET['id'])&&!isset($_GET['team'])){
    function get_list($table_name,$category){

        $list = array();
        $query = mysql_query("SELECT * FROM $table_name WHERE category=$category order by id desc");
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
    $id=$_GET['id'];
    $pic_list=get_list('game',$id);
}elseif(!isset($_GET['id'])&&isset($_GET['team'])||isset($_GET['hunt_box'])){
    function get_list($table_name,$team){

        $list = array();
        $query = mysql_query("SELECT * FROM $table_name WHERE host_team='$team'||guest_team='$team' order by id desc");
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
    if(isset($_GET['hunt_box'])){
        $team=$_GET['hunt_box'];
    }else{
        $team=$_GET['team'];
    }

    $pic_list=get_list('game',$team);
}elseif(!isset($_GET['id'])&&!isset($_GET['team'])){
    function get_list($table_name){

        $list = array();
        $query = mysql_query("SELECT * FROM $table_name order by id desc");
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
    $pic_list=get_list('game');
}



?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/game.css"/>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>联赛数据库</title>
    <style>
        html { -webkit-text-size-adjust:none }

    </style>
    <style>
        .pic_box img{

            border:10px solid rgba(229, 171, 239, 0.23);
            box-shadow: 0 0 10px 1px #808080;
        }
    </style>
</head>
<body style="background-color: #f9c3ac">
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
<div class="title container-fluid">
    <p>浙江省大学生篮球联赛</p>
</div>
<div class="container w-800">
    <div class="search">
        <form class="form-inline" style="text-align: center;padding-bottom: 50px">
            <div class="form-group" style="width: 100%">
                <div class="input-group row" style="width:100%;margin-left:0;margin-right:0">
                    <div class="input-group-addon hidden-xs hidden-sm" id="hunt"  style="background-color: #0782C1;color:#fff;width: 20%;cursor: pointer">请输入参赛队名称进行搜索</div>
                    <div class="input-group-addon hidden-md hidden-lg" id="hunt"  style="background-color: #0782C1;color:#fff;width: 20%;cursor: pointer;  padding-left: 5px;padding-right: 5px;">按队名搜</div>
                    <input type="text" class="form-control" name="hunt_box" id="exampleInputAmount" style="background-color:#9b7674;color:#fff"/>
                    <div class="input-group-addon dropdown" style="width: 20%;background-color: #fff">
                        <a id="dLabel" class="hidden-xs hidden-sm" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black">
                            选择组别进行搜索
                            <span class="caret"></span>
                        </a>
                        <a id="dLabel" class="hidden-md hidden-lg" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;padding-left: 5px;padding-right: 10px">
                            按组别搜
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" id="select" aria-labelledby="dLabel">
                            <li><a href="/game.php">所有组别</a></li>
                            <li><a href="/game.php?id='男子甲A'">男子甲A</a></li>
                            <li><a href="/game.php?id='男子甲B'">男子甲B</a></li>
                            <li><a href="/game.php?id='男子乙A'">男子乙A</a></li>
                            <li><a href="/game.php?id='男子乙B'">男子乙B</a></li>
                            <li><a href="/game.php?id='女子甲'">女子甲</a></li>
                            <li><a href="/game.php?id='女子乙'">女子乙</a></li>
                            <li><a href="/game.php?id='丙组'">丙组</a></li>
                            <li><a href="/game.php?id='丁组'">丁组</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="content">
        <table cellspacing="0" cellpadding="0" class="hidden-xs hidden-sm">
            <tbody>
            <tr class="row">
                <th class="col-md-2 col-xs-2">比赛日期</th>
                <th class="col-md-3 col-xs-3">主队</th>
                <th class="col-md-4 col-xs-4">客队</th>
                <th class="col-md-2 col-xs-2">组别</th>
                <th class="col-md-1 col-xs-1">详情</th>
            </tr>
            <?php foreach($pic_list as $row):?>
            <tr class="row info <?php echo $row['category'];?>">
                <td class="col-md-2 col-xs-2"><?php echo $row['time'];?></td>
                <td class="col-md-3 col-xs-3 host_team"><?php echo $row['host_team'];?></td>
                <td class="col-md-4 col-xs-4"><?php echo $row['guest_team'];?></td>
                <td class="col-md-2 col-xs-2"><?php echo $row['category'];?></td>
                <td class="details col-md-1 col-xs-1" style="position:relative">
                    <a class="look">查看</a>
                    <ul class="inner_list list-unstyled" style="border-radius: 2px">
                        <li><a>临场记录统计表</a></li>
                        <li><a>比赛记录表</a></li>
                        <li><a>得分走势图</a></li>
                        <li><a>动作记录表</a></li>
                    </ul>
                </td>
            </tr>
                <div>
                    <div class="pic_box">
                            <img class="pic pic_1" width="768px" height="543px"  src="<?php echo $row['pic_1'];?>" alt=""/>
                            <img class="pic pic_2" width="384px" height="543px"  src="<?php echo $row['pic_2'];?>" alt=""/>
                            <img class="pic pic_2" width="384px" height="543px"  src="<?php echo $row['pic_3'];?>" alt=""/>
                            <img class="pic pic_2" width="384px" height="534px"  src="<?php echo $row['pic_4'];?>" alt=""/>
                    </div>
                </div>
            <?php endforeach;?>
            </tbody>
        </table>

        <div class="list-nav hidden-md hidden-lg">
            <ul class="list-unstyled list-inline row" style="margin: 0">
                <li class="col-xs-2">日期</li>
                <li class="col-xs-3">主队</li>
                <li class="col-xs-3">客队</li>
                <li class="col-xs-2">组别</li>
                <li class="col-xs-2" style="text-align: right">详情</li>
            </ul>
        </div>
        <div class="list-content hidden-md hidden-lg">
            <?php foreach($pic_list as $row):?>
            <ul class="list-unstyled list-inline row" style="margin: 0">
                <li class="one tow col-xs-2"><?php echo $row['time'];?></li>
                <li class="one tow col-xs-3" title="<?php echo $row['host_team'];?>"><?php echo $row['host_team'];?></li>
                <li class="one tow col-xs-3" title="<?php echo $row['guest_team'];?>"><?php echo $row['guest_team'];?></li>
                <li class="one col-xs-2"><?php echo $row['category'];?></li>
                <li class="one col-xs-2 dropdown" style="text-align: right">
                    <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding: 2px;font-size: 11px;" class="btn btn-primary check">
                        查看
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu check_list" aria-labelledby="dLabel">
                        <li style="color:#333">临场记录统计表</li>
                        <li style="color:#333">比赛记录表</li>
                        <li style="color:#333">得分走势图</li>
                        <li style="color:#333">动作记录表</li>
                    </ul>
                </li>
            </ul>
            <?php endforeach;?>
        </div>

    </div>
</div>
<div id="d-mask" style="display:none"></div>

<script>
    $(document).ready(function(){
        $(".details .inner_list li").click(function(){
            var x = $(this).index();
            var y = $(this).parent().parent().parent(".info").index();
            $(".pic_box").eq(y-1).children(".pic").eq(x).slideDown("1000");
            $("#d-mask").css({display:"block"})
        });
        $(".check_list li").click(function(){
            var x = $(this).index();
            var y = $(this).parent().parent().parent().index();
            $(".pic_box").eq(y-1).children(".pic").eq(x).slideDown("1000");
            $("#d-mask").css({display:"block"})
        });

        $(".pic_box").click(function(){
           $(".pic_box .pic").slideUp("1000");
            $("#d-mask").css({display:"none"})
        });
        $("#d-mask").click(function(){
            $(this).css({display:"none"});
            $(".pic_box .pic").slideUp("1000");
        })
        $('.dropdown-toggle').dropdown();
    })
</script>
<script>
    $("#hunt").click(function(){
        var a = $('input[name=hunt_box]').val();
        window.location.href="/game.php?team="+a;
    })

</script>
</body>
</html>
