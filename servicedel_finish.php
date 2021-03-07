<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$DBNAME = "table";
$DBUSER = "root";
$DBPASSWD = "d0497563";
$DBHOST = "localhost";
$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
$user = @$_SESSION['username'];

if($_SESSION['username']!=null){
    $sql = "DELETE FROM umbrella where user='$user'";
    if(mysqli_query($conn,$sql))
    {       
        //echo "歸還成功!";
        echo "<script>alert('歸還成功!')</script>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=service.php>';
    }
    else
    {
            $conn->query($sql) or die($conn->error);
            echo "<script>alert('歸還失敗!')</script>";
            //echo "<script>alert('刪除失敗!')</script>";
           // echo '<meta http-equiv=REFRESH CONTENT=2;url=service.php>';
    }
}
else{
    echo "請先登入後，再進行租借服務";
}