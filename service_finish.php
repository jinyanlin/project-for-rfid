<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$DBNAME = "table";
$DBUSER = "root";
$DBPASSWD = "d0497563";
$DBHOST = "localhost";
$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
$user = @$_SESSION['username'];
$amount = @$_POST['amount'];
$totalsum = $_SESSION['totalsum'];
if($_SESSION['username']!=null){
    //雨傘數量判斷
    if($amount>$totalsum){
        echo "<script>alert('租借數量大於目前雨傘數量，請重新輸入')</script>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=service.php>';
    }  
    else
    {
        $sql = "insert into umbrella (user,total) values ('$user', '$amount')";
        if(mysqli_query($conn,$sql))
        {       
            echo "<script>alert('租借成功!')</script>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=service.php>';
        }
        else
        {
                $conn->query($sql) or die($conn->error);
                echo "<script>alert('租借失敗!')</script>";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=service.php>';
        }
    }
    
}
else{
    echo "請先登入後，再進行租借服務";
}