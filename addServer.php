<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/30
 * Time: 19:31
 */
header("Content-type: text/html; charset=utf-8");
$image = $_POST['image'];
$description = $_POST['description'];
$sort = $_POST['sort'];
$arr = explode(",",$image);
$arrlength=count($arr);
require_once "mysql.php";
connectDb();
for($x=0;$x<$arrlength;$x++) {
    $image = "http://demo.basketball-game.cn/usr/uploads/HSgallery/".$arr[$x].".jpg";

    $sql="INSERT INTO typecho_gallery(image,thumb,description,sort)VALUES('$image','$image','$description','$sort')";
}
if (!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}
echo "添加成功";

mysql_close();