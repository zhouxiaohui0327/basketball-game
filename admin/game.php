<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/12/20
 * Time: 13:37
 */

$action = isset($_GET['action']) ? $_GET['action'] : '';
if(empty($action)) {
    die('no action');
}
if($action == 'upload') {
    if(!empty($_FILES['files']['name'])){
        $file_name = $_FILES['files']['name'];
        $file_tmp_name = $_FILES['files']['tmp_name'];
        if(empty($file_name[0]) && empty($file_tmp_name[0])) {
            echo json_encode(array('success'=>false));
        }
        $new_name = md5(file_get_contents($file_tmp_name[0]));
        $new_file_name = '/usr/uploads/upload/'.$file_name[0];
        $r = move_uploaded_file($file_tmp_name[0], __DIR__ . '/..'.$new_file_name);
        if(!$r) {
            echo json_encode(array('success'=>false));
        } else {
            $result = array(
                'success' => true,
                'data' => array(
                    'url' => $new_file_name,
                )
            );
            echo json_encode($result);

        }
    }


} else if($action == 'add_game') {

    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $date_time =isset($_POST['date_time']) ? $_POST['date_time'] : '';
    $saiji =isset($_POST['saiji']) ? $_POST['saiji'] : '';
    $host_team =isset($_POST['host_team']) ? $_POST['host_team'] : '';
    $guest_team =isset($_POST['guest_team']) ? $_POST['guest_team'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $pic_1 =isset($_POST['pic_1']) ? $_POST['pic_1'] : '';
    $pic_2 = isset($_POST['pic_2']) ? $_POST['pic_2'] : '';
    $pic_3 = isset($_POST['pic_3']) ? $_POST['pic_3'] : '';
    $pic_4 = isset($_POST['pic_4']) ? $_POST['pic_4'] : '';
    require_once "../mysql.php";
    connectDb();
    $sql = "INSERT INTO game(id,date_time,saiji,host_team,guest_team,category,pic_1,pic_2,pic_3,pic_4)VALUES('$id','$date_time','$saiji','$host_team','$guest_team','$category','$pic_1','$pic_2','$pic_3','$pic_4')";

    if (!mysql_query($sql))
    {
        die('Error: ' . mysql_error());
    }
    echo "添加成功";

    mysql_close();


    header("Location:/admin/add_game.php");

}
