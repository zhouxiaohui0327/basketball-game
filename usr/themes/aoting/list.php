<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/10/25
 * Time: 20:59
 */
header("Content-type:text/html;charset=utf8");

//$message = file_get_contents("list.txt");
//$message2 =  str_replace("\n",'<br/>', $message);
//$message2 = nl2br($message);
//echo $message2;

      $file = fopen("list.txt","r");

       while(!feof($file))
       {
           $line=fgets($file);
           $line_array =explode("|",$line);
           if(count($line_array)< 2 ) {
               continue;
           };
           $id= $line_array[0];
           $school= $line_array[1];
           $number=$line_array[2];
           echo " 名次:".$id."....."."学校:".$school."....."."分数:".$number."<br/>";
       }
       fclose($file);


?>



<div>
    <form action="./save.php" method="POST">

        名次:<input type="text" name="id">
        <br/>
        学校:<input type="text" name="school">
        <br/>
        分数:<input type="text" name="number">
        <input type="submit" value="提交">
    </form>
</div>