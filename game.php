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

$limit = 20;
$b = 3 ;
function get_list($table_name,$where){
    global $page;
    global $limit;
    $startCount = ($page - 1) * $limit;
    $list = array();
    $query = mysql_query("SELECT * FROM $table_name WHERE $where order by date_time desc limit $startCount ,$limit");
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
$where = "1";
$s_d= isset($_GET['s_d']) ? $_GET['s_d'] : '';
$e_d = isset($_GET['e_d']) ? $_GET['e_d'] : '';

$s_j = isset($_GET['s_j']) ? $_GET['s_j'] : '';
if($s_j=="所有赛季"):$s_j="";endif;
$q_d = isset($_GET['q_d']) ? $_GET['q_d'] : '';
if($q_d=="所有球队"):$q_d="";endif;

if(!empty($s_j)) {
    $where = $where . " and saiji='{$s_j}'";
}
if(!empty($q_d)) {
    $where .= " and host_team='{$q_d }'||guest_team='{$q_d}'";
}
if(!empty($s_d) && !empty($e_d)) {
    $where .= " and date_time>='{$s_d}' and date_time<='{$e_d}'";
}
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$option ="id=";
if(!empty($s_j)) {
    $option .=  "&s_j=$s_j";
}
if(!empty($q_d)) {
    $option .=  "&q_d=$q_d";
}
if(!empty($s_d) && !empty($e_d)) {
    $option .=  "&s_d=$s_d&e_d=e_d";
}
$pic_list=get_list('game',$where);
$startCount = ($page - 1) * $limit;
$query = mysql_query("SELECT * FROM game WHERE $where order by date_time desc");
$totalNumber = mysql_num_rows($query);
$totalPage=ceil($totalNumber/$limit);
?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap-datetimepicker.css"/>
    <link rel="stylesheet/less" href="./less/datetimepicker.less"/>
    <link rel="stylesheet" href="css/game.css"/>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="./js/bootstrap-datetimepicker.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--    <script src="./js/bootstrap-datetimepicker.js"></script>-->
    <script src="./js/bootstrap-datetimepicker.zh-CN.js"></script>

    <link href="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/locales/bootstrap-datepicker.zh-CN.min.js"></script>
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
<!--    <div class="search"style="display:none" >-->
<!--        <form class="form-inline i_form" style="text-align: center;">-->
<!--            <div class="form-group" style="width: 100%">-->
<!--                <div class="input-group row" style="width:100%;margin-left:0;margin-right:0">-->
<!--                    <div class="input-group-addon hidden-xs hidden-sm" id="hunt"  style="background-color: #0782C1;color:#fff;width: 20%;cursor: pointer">请输入参赛队名称进行搜索</div>-->
<!--                    <div class="input-group-addon hidden-md hidden-lg" id="hunt"  style="background-color: #0782C1;color:#fff;width: 20%;cursor: pointer;  padding-left: 5px;padding-right: 5px;">按队名搜</div>-->
<!--                    <input type="text" class="form-control" name="hunt_box" id="exampleInputAmount" style="background-color:#9b7674;color:#fff"/>-->
<!--                    <div class="input-group-addon dropdown" style="width: 20%;background-color: #fff">-->
<!--                        <a id="dLabel" class="hidden-xs hidden-sm" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black">-->
<!--                            选择组别进行搜索-->
<!--                            <span class="caret"></span>-->
<!--                        </a>-->
<!--                        <a id="dLabel" class="hidden-md hidden-lg" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:black;padding-left: 5px;padding-right: 10px">-->
<!--                            按组别搜-->
<!--                            <span class="caret"></span>-->
<!--                        </a>-->
<!---->
<!--                        <ul class="dropdown-menu" id="select" aria-labelledby="dLabel">-->
<!--                            <li><a href="/game.php">所有组别</a></li>-->
<!--                            <li><a href="/game.php?id='男子甲A'">男子甲A</a></li>-->
<!--                            <li><a href="/game.php?id='男子甲B'">男子甲B</a></li>-->
<!--                            <li><a href="/game.php?id='男子乙A'">男子乙A</a></li>-->
<!--                            <li><a href="/game.php?id='男子乙B'">男子乙B</a></li>-->
<!--                            <li><a href="/game.php?id='女子甲'">女子甲</a></li>-->
<!--                            <li><a href="/game.php?id='女子乙'">女子乙</a></li>-->
<!--                            <li><a href="/game.php?id='丙组'">丙组</a></li>-->
<!--                            <li><a href="/game.php?id='丁组'">丁组</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
    <div class="clearfix select_wrap">
        <form class="form-inline" action="">
            <div class="dropdown s_j_select_box select_box pull-left">
                <span style="font-size: 15px;line-height: 28px" class="pull-left hidden-xs hidden-sm">赛季</span>
                <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #fff;border: 1px solid #ddd;font-size: 20px;padding-left: 5px;padding-right: 5px;height: 28px;border-radius: 5px;width: 77px;" class="pull-left">
                    <span class="s_j">所有赛季</span>
                    <span class="caret pull-right" style="margin-top: 10px;"></span>
                </a>
                <ul class="dropdown-menu s_j_list" aria-labelledby="dLabel" style="min-width:77px;padding: 5px;cursor: pointer">
                    <li>所有赛季</li>
                    <li>2015</li>
                </ul>
            </div>

            <input type="text" name="s_j" style="display: none"/>
            <input type="text" name="q_d" style="display: none"/>
            <div class="dropdown q_d_select_box select_box pull-left">
                <span style="font-size: 15px;line-height: 28px" class="pull-left hidden-xs hidden-sm">球队</span>
                <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="background-color: #fff;width:200px;border: 1px solid #ddd;font-size: 20px;padding-left: 5px;padding-right: 5px;height: 28px;border-radius: 5px;  white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="pull-left">
                    <span class="q_d">所有球队</span>
                    <span class="caret pull-right" style="margin-top: 10px"></span>
                </a>
                <ul class="dropdown-menu q_d_list" aria-labelledby="dLabel" style="height: 200px;overflow: scroll;padding: 5px;cursor:pointer;overflow-x:hidden;">
                    <li>所有球队</li>
                    <li>中国计量学院</li>
                    <li>宁波工程学院</li>
                    <li>浙江大学</li>
                    <li>温州大学</li>
                    <li>浙江树人大学</li>
                    <li>浙江财经大学</li>
                    <li>浙江师范大学</li>
                    <li>浙江理工大学</li>
                    <li>嘉兴职业技术学院</li>
                    <li>浙江机电职业技术学院</li>
                    <li>宁波城市职业技术学院</li>
                    <li>绍兴职业技术学院</li>
                    <li>浙江横店影视职业学院</li>
                    <li>杭州职业技术学院</li>
                    <li>浙江经贸职业技术学院</li>
                    <li>浙江长征职业技术学院</li>
                    <li>浙江舟山群岛新区旅游与健康职业学院</li>
                    <li>浙江旅游职业学院</li>
                    <li>浙江警察学院</li>
                    <li>杭州电子科技大学</li>
                    <li>中国美术学院</li>
                    <li>浙江工商大学</li>
                    <li>浙江传媒学院</li>
                    <li>浙江财经大学</li>
                    <li>浙江中医药大学</li>
                    <li>浙江工业大学</li>
                    <li>浙江农林大学暨阳学院</li>
                    <li>浙江农林大学</li>
                    <li>浙江宁波理工学院</li>
                    <li>浙江宁交通职业技术学院</li>
                    <li>湖州职业技术学院</li>
                    <li>宁波城市职业技术学院</li>
                    <li>绍兴职业技术学院</li>
                    <li>浙江金融职业学院</li>
                    <li>浙江纺织服装职业技术学院</li>
                    <li>浙江经济职业技术学院</li>
                    <li>浙江广厦建设职业技术学院</li>
                    <li>浙江科技职业技术学院</li>
                    <li>温州科技职业学院</li>
                    <li>丽水学院</li>
                    <li>台州学院</li>
                    <li>杭州师范大学</li>
                    <li>宁波大学</li>
                    <li>绍兴文理学院</li>
                    <li>浙江工业职业技术学院</li>
                    <li>浙江育英职业技术学院</li>
                    <li>浙江水利水电学院</li>
                    <li>浙江大学城市学院</li>
                    <li>浙江财经大学东方学院</li>
                    <li>杭州电子科技大学</li>
                    <li>中国美术学院</li>
                    <li>温州大学瓯江学院</li>
                    <li>嘉兴学院</li>
                    <li>浙江万里学院</li>
                    <li>浙江工商大学杭州商学院</li>
                    <li>宁波大红鹰学院</li>
                    <li>浙江农林大学暨阳学院</li>
                    <li>浙江工业大学之江学院</li>
                    <li>同济大学浙江学院</li>
                    <li>浙江理工大学科技与艺术学院</li>
                </ul>
            </div>
            <div class="s_d_select_box select_box pull-left">
                <div class="control-group hidden-xs hidden-sm">
                    <label class="control-label pull-left" style="line-height: 25px;margin-right: 5px;font-size: 15px;font-weight:normal">起始日期</label>
                    <div class="controls input-append date form_date pull-left" data-date="" data-date-format="yyyy mm dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input size="16" style="height: 25px;border: 1px solid #ddd;border-radius: 5px;" name="s_d" type="text" value="" readonly>
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>

                </div>
            </div>
            <div class="e_d_select_box select_box hidden-xs hidden-sm">
                <div class="control-group">
                    <label class="control-label pull-left" style="line-height: 25px;margin-right: 5px;font-size: 15px;font-weight:normal">结束日期</label>
                    <div class="controls input-append date form_date pull-left" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input size="16" style="height: 25px;border: 1px solid #ddd;border-radius: 5px;" name="e_d" type="text" value="" readonly>
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
            </div>
            <div class="search_btn select_box">
                <input class="btn btn-info search_btn" type="submit" value="搜索"/>
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
                <td class="col-md-2 col-xs-2"><?php echo $row['date_time'];?></td>
                <td class="col-md-3 col-xs-3 host_team" title="<?php echo $row['host_team'];?>"><?php echo $row['host_team'];?></td>
                <td class="col-md-4 col-xs-4" title="<?php echo $row['guest_team'];?>"><?php echo $row['guest_team'];?></td>
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
                <li class="one tow col-xs-2"><?php echo date('m-d',strtotime($row['date_time']));?></li>
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
<?php if($totalNumber>$limit):?>
    <div class="nav_wrap container" style="text-align: center">
        <nav>
            <ul class="pagination">
                <?php if($page<=1):?>
                    <li>
                        <a aria-label="Previous">
                            <span aria-hidden="true" style="line-height: 1.42857143">&laquo;</span>
                        </a>
                    </li>
                <?php else:?>
                    <li>
                        <a href="/game.php?<?php echo $option;?>&page=<?php echo $page - 1;?>" aria-label="Previous">
                            <span aria-hidden="true" style="line-height: 1.42857143">&laquo;</span>
                        </a>
                    </li>
                <?php endif;?>
                <?php if($totalPage<=5):?>
                    <?php for ($i=1;$i<=$totalPage;$i++):?>
                        <li><a href="/game.php?<?php echo $option;?>&page=<?php echo $i;?>"><?php echo $i ;?></a></li>
                    <?php endfor;?>
                <?php elseif($totalPage>5&&$page>=4):?>
                    <?php for ($i=$page-$b;$i<=$page+$b&&$i<=$totalPage;$i++):?>
                        <li><a href="/game.php?<?php echo $option;?>&page=<?php echo $i;?>"><?php echo $i ;?></a></li>
                    <?php endfor;?>
                <?php elseif($totalPage>5&&$page<4):?>
                    <?php for ($i=1;$i<=$page+3&&$i<=$totalPage;$i++):?>
                        <li><a href="/game.php?<?php echo $option;?>&page=<?php echo $i;?>"><?php echo $i ;?></a></li>
                    <?php endfor;?>
                <?php endif;?>
                <?php if($page>=$totalPage):?>
                    <li>
                        <a aria-label="Next">
                            <span aria-hidden="true" style="line-height: 1.42857143">&raquo;</span>
                        </a>
                        <span class="total"><?php echo "共".$totalPage."页";?></span>
                    </li>
                <?php else:?>
                    <li>
                        <a href="/game.php?<?php echo $option;?>&page=<?php echo $page + 1;?>" aria-label="Next">
                            <span aria-hidden="true" style="line-height: 1.42857143">&raquo;</span>
                        </a>
                    </li>
                <?php endif;?>
            </ul>
        </nav>
    </div>
<?php endif;?>
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
//        $('.form_date').datetimepicker({
//
//            format: 'yyyy-mm-dd',
//            language:  'zh-CN',
//            weekStart: 1,
//            todayBtn:  1,
//            autoclose: 1,
//            todayHighlight: 1,
//            startView: 2,
//            minView: 2,
//            forceParse: 0
//        });
        $('input[name=s_d]').datepicker({
            format: 'yyyy-mm-dd',
            language:  'zh-CN',
            todayHighlight: 1,
            forceParse: 0
        });
        $('input[name=e_d]').datepicker({
            format: 'yyyy-mm-dd',
            language:  'zh-CN',
            todayHighlight: 1,
            forceParse: 0
        });
    })
</script>
<script>
    $(".q_d_select_box ul li").click(function(){
        var x = $(this).html();
        $(".q_d").html(x);
        $('input[name=q_d]').val(x);
    })
    $(".s_j_select_box ul li").click(function(){
        var x = $(this).html();
        $(".s_j").html(x);
        $('input[name=s_j]').val(x);
    })
</script>


<!--<script>-->
<!--    $("#hunt").click(function(){-->
<!--        var a = $('input[name=hunt_box]').val();-->
<!--        window.location.href="/game.php?team="+a;-->
<!--    })-->
<!---->
<!--</script>-->

</body>
</html>
