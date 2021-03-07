<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$username = $_POST['username'];
$userid = $_POST['userid'];
$userid2 = $_POST['userid2'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$birth = $_POST['birth'];
$email = $_POST['email'];
$any = $_POST['any'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($username != null && $userid != null && $userid2 != null && $userid == $userid2)
{
        //新增資料進資料庫語法
        $sql = "insert into guest (username, userid,userid2, phone, address, birth, email, any, checkin, checkout) values ('$username', '$userid','$userid2', '$phone', '$address', '$birth', '$email', '$any', '$checkin', '$checkout')";
        if(mysql_query($sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=guest.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
        #echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage.php>';
}
?>