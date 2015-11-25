<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/25
 * Time: 14:21
 */

?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link rel="stylesheet" href="./picture_mobile.css"/>
    <script src="jquery-2.1.4.js"></script>
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
<div class="header w-600">
    <div class="header_above">
        <img  src="/usr/themes/aoting/img/logo.png" class="logo left" alt=""/>
        <div class="search-frame right">
            <form id="search" method="post" action="./" role="search">
                <input type="text"name="s" class="text left" placeholder="  Search" />
                <button type="submit" class="sure left" >搜索</button>
            </form>
        </div>
    </div>
    <div class="nav" id="nav-menu">
        <ul>
            <li><a href="/index.php">首页</a></li>
            <li><a href="/index.php/category/news/">新闻中心</a></li>
            <li><a href="/index.php/game.html">篮球联赛</a></li>
            <li><a href="/index.php/aoting.html">奥廷体育</a></li>
            <li><a href="/index.php/contact.html/">联系我们</a></li>
        </ul>
    </div>
</div>
<h2 class="title">2015浙江大学生篮球联赛</h2>
<!--<div class="main_nav_wrap w-600">-->
<!--        <ul>-->
<!--            <li class="active">2015男子甲A组</li>-->
<!--            <li>2015女子甲组</li>-->
<!--            <li>2015男子甲B组</li>-->
<!--            <li>2015男子乙B组</li>-->
<!--            <li>2015男子乙A组</li>-->
<!--            <li>2015女子乙组</li>-->
<!--            <li>2015丙丁组</li>-->
<!--        </ul>-->
<!--</div>-->
<div class="bar_nav_wrap">
    <div class="bar_nav">
        <div class="bar_nav_inner">

        </div>
    </div>
</div>
</body>
</html>