<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$username = @$_POST['username'];
$name = @$_POST['name'];
$email = @$_POST['email'];
$phone = @$_POST['phone'];
$author = @$_POST['author'];
$message = @$_POST['message'];
$current_time = date("Y-m-d H:i:s");

$DBNAME = "table";
$DBUSER = "root";
$DBPASSWD = "";
$DBHOST = "localhost";
$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if(@$_SESSION['username']!= null)
{
        //新增資料進資料庫語法
        $sql = "insert into contract (name,author,email,phone,message,date) values ('$name','$author', '$email','$phone', '$message', '$current_time')";
        if(mysqli_query($conn,$sql))
        {       
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage.php>';
        }
        else
        {
                $conn->query($sql) or die($conn->error);
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=contact.html>';
        }
}
else
{
        echo '您尚未登入!';
        #echo '<meta http-equiv=REFRESH CONTENT=2;url=homepage.php>';
}
?>