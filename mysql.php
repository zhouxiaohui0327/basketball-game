<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/24
 * Time: 13:24
 */
function connectDb(){
    $con = mysql_connect('localhost','root','123456');
    if(!$con){
        die('can not connect db');
    }
    mysql_select_db('typecho');
    mysql_query("SET NAMES 'utf8'");
    return $con;
}