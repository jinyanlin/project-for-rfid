<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "table";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "";
$con=mysqli_connect($db_server, $db_user, $db_passwd);
//對資料庫連線
if(!$con){
 die("無法對資料庫連線");
}
       

/*資料庫連線採UTF8
//mysqli_query("SET NAMES utf8");
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
} else {
    printf("Current character set: %s\n", $mysqli->character_set_name());
}*/
//選擇資料庫
if(!mysqli_select_db($con,$db_name))
        die("無法使用資料庫");
?> 