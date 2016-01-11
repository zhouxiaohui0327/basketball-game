<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/12/14
 * Time: 12:53
 */
header("Content-type: text/html; charset=utf-8");
require_once "../mysql.php";
connectDb();
$limit = 20;
$b = 3 ;
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$startCount = ($page - 1) * $limit;
$con = mysql_query("SELECT * FROM game order by date_time desc limit $startCount ,$limit");
$query = mysql_query("SELECT * FROM game order by date_time desc");
$totalNumber = mysql_num_rows($query);
$totalPage=ceil($totalNumber/$limit);

?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/usr/themes/aoting/img/1234.png" media="screen" />
    <link rel="stylesheet" href="/admin/css/style.css?v=14.10.10">

    <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/game.css"/>
    <script src="../js/jquery-2.1.4.js"></script>
    <title>联赛数据库</title>
    <style>
        .pic_box img{
            display: none;
            border:10px solid rgba(229, 171, 239, 0.23);
            box-shadow: 0 0 10px 1px #808080;
        }
        input{border-radius: 5px}
        *{padding:0;  margin: 0;}
        .w-1200{
            width: 70%;
            margin: 0 auto;
            min-width: 1200px;
            max-width: 1280px;
        }
        .file_css{font-size: 18px;height: 50px;}


         .fileinput-button {
             position: relative;
             overflow: hidden;
             display: inline-block;
         }
        .fileinput-button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            -ms-filter: 'alpha(opacity=0)';
            font-size: 200px;
            direction: ltr;
            cursor: pointer;
        }
    </style>

    <link href="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap-datepicker/1.5.0/locales/bootstrap-datepicker.zh-CN.min.js"></script>

    <script src="//cdn.bootcss.com/blueimp-file-upload/9.10.4/vendor/jquery.ui.widget.js"></script>

    <script src="//cdn.bootcss.com/blueimp-file-upload/9.10.4/jquery.iframe-transport.js"></script>

    <script src="//cdn.bootcss.com/blueimp-file-upload/9.10.4/jquery.fileupload.js"></script>

    <script src="//cdn.bootcss.com/blueimp-file-upload/9.10.4/jquery.fileupload-ui.js"></script>

    <script src="//cdn.bootcss.com/blueimp-file-upload/9.10.4/jquery.fileupload-process.js"></script>
</head>
<body style="background-color: #F6F6F3">
<div class="typecho-head-nav clearfix" role="navigation">
    <nav id="typecho-nav-list">
        <ul class="root focus"><li class="parent"><a href="/admin/index.php">控制台</a></li><ul class="child"><li class="focus"><a href="/admin">概要</a></li><li><a href="/admin/profile.php">个人设置</a></li><li><a href="/admin/plugins.php">插件</a></li><li class="last"><a href="/admin/themes.php">外观</a></li></ul></ul><ul class="root"><li class="parent"><a href="/admin/write-post.php">撰写</a></li><ul class="child"><li><a href="/admin/write-post.php">撰写新闻</a></li><li class="last"><a href="/admin/write-page.php">创建页面</a></li></ul></ul><ul class="root"><li class="parent"><a href="/admin/manage-posts.php">管理</a></li><ul class="child"><li><a href="/admin/manage-posts.php">新闻</a></li><li><a href="/admin/add_game.php">赛事数据</a></li><li><a href="/admin/manage-pages.php">独立页面</a></li><li><a href="/admin/manage-categories.php">分类</a></li><li><a href="/admin/manage-tags.php">标签</a></li><li><a href="/admin/manage-medias.php">文件</a></li><li><a href="/admin/manage-users.php">用户</a></li><li class="last"><a href="/admin/extending.php?panel=HighSlide%2Fmanage-gallery.php">页面相册</a></li></ul></ul><ul class="root"><li class="parent"><a href="/admin/options-general.php">设置</a></li><ul class="child"><li><a href="/admin/options-general.php">基本</a></li><li><a href="/admin/options-reading.php">阅读</a></li><li class="last"><a href="/admin/options-permalink.php">永久链接</a></li></ul></ul>    </nav>
    <div class="operate">
        <a title="最后登录: 2天前" href="/admin/profile.php" class="author">admin</a><a href="http://www.zjoteam.com/" target="_blank">网站</a>
    </div>
</div>
<div class="container" style="">
    <div style="margin: 20px 0; background-color: #fff; padding:10px;">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>比赛日期</th>
                    <th>赛季</th>
                    <th>主队</th>
                    <th>客队</th>
                    <th>组别</th>
                    <th>详情</th>
                    <th>选项</th>
                </tr>
            </thead>
            <tbody>

            <?php while($row = mysql_fetch_array($con)):?>
                <tr class="pic-info">
                    <td><?php echo $row['date_time'];?></td>
                    <td><?php echo $row['saiji'];?></td>
                    <td><?php echo $row['host_team'];?></td>
                    <td><?php echo $row['guest_team'];?></td>
                    <td><?php echo $row['category'];?></td>
                    <td class="details col-md-1" style="position:relative">
                        <a class="look btn btn-xs btn-info">查看</a>
                        <ul class="inner_list list-unstyled">
                            <li><a>临场记录统计表</a></li>
                            <li><a>比赛记录表</a></li>
                            <li><a>得分走势图</a></li>
                            <li><a>动作记录表</a></li>
                        </ul>
                    </td>
                    <td>
                        <a game_id="<?php echo $row[0];?>" class="btn btn-xs btn-danger delete-row" href="javascript:void(0);">删除</a>
                        <a game_id="<?php echo $row[0];?>" id="modifyBtn" href="#tiaozhuan" class="btn btn-xs btn-success modify-row">修改</a>
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
            <?php endwhile;?>
            </tbody>
        </table>
    </div>
    <script>
        $(".details .inner_list li").click(function(){
            var x = $(this).index();
            var y = $(this).parent().parent().parent(".pic-info").index();
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

    </script>
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
                            <a href="/admin/add_game.php?page=<?php echo $page - 1;?>" aria-label="Previous">
                                <span aria-hidden="true" style="line-height: 1.42857143">&laquo;</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php if($totalPage<=5):?>
                        <?php for ($i=1;$i<=$totalPage;$i++):?>
                            <li><a href="/admin/add_game.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
                        <?php endfor;?>
                    <?php elseif($totalPage>5&&$page>=4):?>
                        <?php for ($i=$page-$b;$i<=$page+$b&&$i<=$totalPage;$i++):?>
                            <li><a href="/admin/add_game.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
                        <?php endfor;?>
                    <?php elseif($totalPage>5&&$page<4):?>
                        <?php for ($i=1;$i<=$page+3&&$i<=$totalPage;$i++):?>
                            <li><a href="/admin/add_game.php?page=<?php echo $i;?>"><?php echo $i ;?></a></li>
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
                            <a href="/admin/add_game.php?page=<?php echo $page + 1;?>" aria-label="Next">
                                <span aria-hidden="true" style="line-height: 1.42857143">&raquo;</span>
                            </a>
                        </li>
                    <?php endif;?>
                </ul>
            </nav>
        </div>
    <?php endif;?>
</div>

<div class="container" style="position:relative;" id="tiaozhuan">

<form class="form-horizontal" action="/admin/game.php?action=add_game" method="post" style="padding-top: 30px;background:#fff;">
    <div class="form-group" style="display: none">
        <label class="control-label col-md-2" >id</label>
        <div class="col-sm-1">
            <input class="form-control" type="text" name="id">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >比赛日期</label>
        <div class="col-sm-2">
            <input class="form-control" type="text" name="date_time" placeholder="date">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >赛季</label>
        <div class="col-sm-2">
            <select name="saiji" class="form-control">
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >主队</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="host_team" placeholder="主队名称，如：浙江理工大学">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >客队</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="guest_team" placeholder="客队名称，如：浙江大学">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >组别</label>
        <div class="col-sm-2">
            <select class="form-control" name="category">
                <option value="男子甲A">男子甲A</option>
                <option value="男子甲B">男子甲B</option>
                <option value="女子甲">女子甲</option>
                <option value="女子乙">女子乙</option>
                <option value="男子乙A">男子乙A</option>
                <option value="男子乙B">男子乙B</option>
                <option value="丙丁组">丙丁组</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >临场记录统计表</label>
        <div class="col-sm-4">
            <input class="form-control" type="hidden" value="" name="pic_1" placeholder="">
            <span class="btn btn-xs btn-info fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>选择图片</span>
                <!-- The file input field used as target for the file upload widget -->
                <input class="fileupload" targetID="1" type="file" name="files[]" multiple="">
            </span>

            <div class="image_1"></div>
        </div>

    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >比赛记录表</label>
        <div class="col-sm-4">
            <input class="form-control" type="hidden" value="" name="pic_2" placeholder="">
            <span class="btn btn-xs btn-info fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>选择图片</span>
                <!-- The file input field used as target for the file upload widget -->
                <input class="fileupload" targetID="2" type="file" name="files[]" multiple="">
            </span>

            <div class="image_2"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >得分走势图</label>
        <div class="col-sm-4">
            <input class="form-control" type="hidden" value="" name="pic_3" placeholder="">
            <span class="btn btn-xs btn-info fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>选择图片</span>
                <!-- The file input field used as target for the file upload widget -->
                <input class="fileupload" targetID="3" type="file" name="files[]" multiple="">
            </span>

            <div class="image_3"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" >动作记录表</label>
        <div class="col-sm-4">
            <input class="form-control" type="hidden" value="" name="pic_4" placeholder="">
            <span class="btn btn-xs btn-info fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>选择图片</span>
                <!-- The file input field used as target for the file upload widget -->
                <input class="fileupload" targetID="4" type="file" name="files[]" multiple="">
            </span>

            <div class="image_4"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2">
            <button class="btn btn-success sure" type="submit"  value="">确认添加</button>
        </div>
    </div>
</form>

    <script>
        $(".modify-row").click(function(){
            var id = $(this).attr("game_id");
            $.get('/admin/game_modify.php?id='+id,function(result){
                var modify = $.parseJSON(result);
                $("input[name=host_team]").val(modify.host_team);
                $("input[name=guest_team]").val(modify.guest_team);
                $("input[name=date_time]").val(modify.date_time);
                $("select[name=saiji]").val(modify.saiji);
                $("select[name=category]").val(modify.category);
                $('input[name=pic_1]').val(modify.pic_1);
                $('.image_1').html('<img width=80 src="' + modify.pic_1 + '" />');
                $('input[name=pic_2]').val(modify.pic_2);
                $('.image_2').html('<img width=80 src="' + modify.pic_2 + '" />');
                $('input[name=pic_3]').val(modify.pic_3);
                $('.image_3').html('<img width=80 src="' + modify.pic_3 + '" />');
                $('input[name=pic_4]').val(modify.pic_4);
                $('.image_4').html('<img width=80 src="' + modify.pic_4 + '" />');
                $(".sure").html("确认修改");
                $("input[name=id]").val(modify.id);
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $(".delete-row").click(function(a){
                var id = $(this).attr('game_id');
                var line = $(this).parents('tr');
                if(confirm('确定要删除吗？')){
                    $.ajax({
                        url : '../delete.php?id=' + id,
                        type: 'post',
                        data : {id:id},
                        dataType : 'json',
                        success : function(result){
                            if(result['state']){
                                line.remove();
                            }else{
                                alert(result.data);
                            }
                        }
                    })
                }else{
                    return false;
                }
            });



            $('input[name=date_time]').datepicker({
                format: 'yyyy-mm-dd',
                language:  'zh-CN',
                todayHighlight: 1,
                forceParse: 0
            });



            $('.fileupload').fileupload({
                url: '/admin/game.php?action=upload',
                dataType: 'json',
                autoUpload: true,
                done: function (e, data) {
                    if(data.result.success) {
                        var url = data.result.data.url;
                        var i =$(e.target).attr('targetID');
                        $('input[name=pic_' + i + ']').val(url);
                        $('.image_' + i).html('<img width=80 src="' + url + '" />');
                    } else {
                        alert('服务器错误')
                    }
                }
            });

        })
    </script>


</div>
</body>
</html>





