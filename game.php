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
$con = mysql_query("SELECT * FROM game order by id desc");
?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/game.css"/>
    <script src="js/jquery-2.1.4.js"></script>
    <title>联赛数据库</title>
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
            <div class="form-group">
                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                <div class="input-group">
                    <div class="input-group-addon" style="background-color: #0782C1;color:#fff">请输入参赛队名称进行搜索</div>
                    <input type="text" class="form-control" id="exampleInputAmount" style="width: 580px;background-color: #9b7674" >
                    <div class="input-group-addon">选择组别进行搜索</div>
                </div>
            </div>
        </form>
    </div>
    <div class="content">
        <table>
            <tbody>
            <tr class="row">
                <th class="col-md-2">比赛日期</th>
                <th class="col-md-3">主队</th>
                <th class="col-md-4">客队</th>
                <th class="col-md-2">组别</th>
                <th class="col-md-1">详情</th>
            </tr>
            <?php while($row = mysql_fetch_array($con)):?>
            <tr class="row info">
                <td class="col-md-2"><?php echo $row[1];?></td>
                <td class="col-md-3"><?php echo $row[2];?></td>
                <td class="col-md-4"><?php echo $row[3];?></td>
                <td class="col-md-1"><?php echo $row[4];?></td>
                <td class="details col-md-1" style="position:relative">
                    <a class="look">查看</a>
                    <ul class="inner_list list-unstyled">
                        <li><a>临场记录统计表</a></li>
                        <li><a>比赛记录表</a></li>
                        <li><a>得分走势图</a></li>
                        <li><a>动作记录表</a></li>
                    </ul>
                </td>
            </tr>
                <div>
                    <div class="pic_box">
                            <img class="pic" width="768px" height="543px"  src="<?php echo $row[5];?>" alt=""/>
                            <img class="pic" width="384px" height="543px"  src="<?php echo $row[6];?>" alt=""/>
                            <img class="pic" width="384px" height="543px"  src="<?php echo $row[7];?>" alt=""/>
                            <img class="pic" width="384px" height="534px"  src="<?php echo $row[8];?>" alt=""/>
                    </div>
                </div>
            <?php endwhile;?>
            </tbody>
        </table>
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
        $(".pic_box").click(function(){
           $(".pic_box .pic").slideUp("1000");
            $("#d-mask").css({display:"none"})
        });
        $("#d-mask").click(function(){
            $(this).css({display:"none"});
            $(".pic_box .pic").slideUp("1000");
        })

    })
</script>
</body>
</html>