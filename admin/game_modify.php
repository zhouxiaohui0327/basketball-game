<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016/1/8
 * Time: 23:48
 */

header("Content-type:text/html;charset:utf8");
require_once "../mysql.php";
$id=$_GET['id'];
connectDb();
$result = mysql_query("SELECT * FROM game WHERE id=$id");
$result_arr = mysql_fetch_assoc($result);
echo json_encode($result_arr);
die();