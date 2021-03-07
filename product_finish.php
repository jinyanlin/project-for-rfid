<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	
	$DBNAME = "table";
	$DBUSER = "root";
	$DBPASSWD = "";
	$DBHOST = "localhost";

	$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
	/*if (empty($conn)){
	print mysqli_error($conn);
	die ("無法連結資料庫");
	exit;
	}
	else
	{
		die ("已連結資料庫");
	}
	if( !mysqli_select_db($conn, $DBNAME)) {
	die ("無法選擇資料庫");
	}
	// 設定連線編碼
	mysqli_query( $conn, "SET NAMES 'utf8'");*/

					$user_1 = $_SESSION['username'];
					$name_1 = $_SESSION['name'];
					$quantity_1 = $_SESSION['quantity'];
					$price_1 = $_SESSION['price'];
					$total_price = $_SESSION['totalprice'];
					
						
					if(isset($user_1)){
						
						$sql = "insert into `room` (`user`,`productname`,`quantity`,`price`,`totalprice`) values ('$user_1','$name_1','$quantity_1','$price_1','$total_price')";
						 if(mysqli_query($conn,$sql))
        				 {
							$conn->query($sql) or die($conn->error);
							echo "<script>alert('購買商品成功!')</script>";
                			  echo '<meta http-equiv=REFRESH CONTENT=2;url=product_buy.php>';
						 }
						 else
						 {
							$conn->query($sql) or die($conn->error);
							echo "<script>alert('購買商品失敗!')</script>";
							echo '<meta http-equiv=REFRESH CONTENT=1;url=product_buy.php>';
						 }
					}