<?php
 session_start();
 $user = @$_SESSION['username'];
$DBNAME = "table";
$DBUSER = "root";
$DBPASSWD = "";
$DBHOST = "localhost";

$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$database_local="table";
$local = "room";
mysqli_select_db($conn, $local);
$query_Recordset1 = "SELECT * FROM room WHERE user='$user' GROUP BY productname";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($conn,$query_limit_Recordset1) or die(mysqli_error($conn));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($conn,$query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include("mysql_connect.inc.php");

?>
   
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<style>
			th,td{
				text-align:center;
				font-size : 20px;
			}
		</style>
</head>
<!-- Header -->
<div id="header">
				<div class="container"> 
					
					<!-- Logo -->
					<div id="logo">
						<h1><a href="#">???????????????????????????</a></h1>
						<span>Design by LIN</span>
					</div>
					
					<!-- Nav -->
					<nav id="nav">
						<ul>
            	<li><a href="homepage.php">??????</a></li>
							<li><a href="product_buy.php">????????????</a></li>
							<li><a href="navigation.html">??????????????????</a></li>
							<li><a href="contact.php">????????????</a></li>
							<li><a href="service.php">??????????????????</a></li>
							<li class="active"><a href="buy_all.php">????????????</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /Header -->
<div id="page">
		<div class="container">
			<div class="row">
				<div class="3u">
						<section id="sidebard2">
								<header>
										<h2>???????????????</h2>
										<hr>
								</header>
								<ul class="style1">
									<?php 
										$user = @$_SESSION['username'];
										$DBNAME = "arduino";
										$DBUSER = "root";
										$DBPASSWD = "";
										$DBHOST = "localhost";
										$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
										$data=mysqli_query($conn,"select roomno from user where username='$user'");

										if(@$_SESSION['username']==null)
										{
											echo ("????????????!?????????<strong>");
											echo '<a href="login.php"> ??????</a></strong><br>';
											echo "(??????????????????????????????????????????????????????)";
											//echo '/<a href="index_form.html"> ??????</a>';
										}else
										{
											
											echo '<strong>';
											echo $_SESSION['username'];
											echo '????????????';
											echo '<a href="logout.php"> (??????)</a></strong><br>';
											echo "??????:";
											while($rs=mysqli_fetch_row($data)){
												echo $rs[0];
											}
										}
										?>
									</ul>
										
						</section>
							<section id="sidebard2">
								<header>
									<br>
									<br>
									<br>
									<br>					
									<br>
									<h2>????????????</h2>
									<hr>
								</header>
								<ul class="style1">
									<li class="first"><span class="fa fa-check"></span><a href="#">???????????????</a>
										<p>???????????????????????????????????????????????????????????????????????????????????????</p>
									</li><br>
									<li><span class="fa fa-check"></span><a href="#">??????</a>
										<p>??????????????????????????????????????????????????????	</p>
									</li><br>
								</ul>
								
							</section>
						</div>
        <?php
					include("mysql_connect.inc.php");
					$conn=mysqli_connect("localhost","root","","table");
					$data=mysqli_query($conn,"select total from umbrella");//???member???????????????(*)?????????
					//$deldata=mysqli_query($conn,"DELETE FROM umbrella where user=$user");//???member???????????????(*)?????????
        ?>
				
			<div class="9u skel-cell-important">
				<section id="content" >
					<header>
						<h2>??????????????????</h2>
					</header>
					<body>
						<div class="container-contact100">
							<table border="1" table align="" width=60% >
									<tr>
									  <th bgcolor="#FF6600" size=3px>??????(????????????)</th>	
									  <th bgcolor="#FF6600">????????????</th>
									  <th bgcolor="#FF6600">????????????</th>
									  <th bgcolor="#FF6600">??????</th>
									  <th bgcolor="#FF6600">??????</th>
									  <!--<td align="center" bgcolor="#FF6600">?????????</td>-->
							  
									</tr>
									<?php do { ?>
									  <tr>
										<td><?php echo $row_Recordset1['id']; ?></td>
										<td><?php echo $row_Recordset1['user']; ?></td>
										<td><?php echo $row_Recordset1['productname']; ?></td>
										<td><?php echo $row_Recordset1['quantity']; ?></td>
										<td><?php echo $row_Recordset1['price']; ?></td>
										
										<?php 
										$sum = 0;
										$sum = $sum + (int)$row_Recordset1['price']?>
									   <!--<td><a href="update.php?id=<?php echo $row_Recordset1['id']; ?>">??????</a></td>
										<td><a href="delete.php?id=<?php echo $row_Recordset1['id']; ?>">??????</a></td>-->
									  </tr>
									  <?php } while (@$row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
									  
								</table>
								  <?php
								  include("mysql_connect.inc.php");
								  $conn=mysqli_connect("localhost","root","","table");
								  $data=mysqli_query($conn,"select totalprice from room WHERE user='$user' GROUP BY productname DESC ORDER BY id ASC;");//???member???????????????(*)?????????
							  
									  $sum=0; 
									  if($data){
										  while($rs=mysqli_fetch_row($data)){
										  $curr=(int)($rs[0]);
										  $sum = $sum+$curr;
										  //$i++;
										  //echo $curr.'<br>';
										}
										echo '<br><p align=center><strong>';
										echo "?????????:";
										echo $sum;
										echo '</strong></p>';
									  }
									  else{
										  echo "?????????:0";
										  //echo $sum;
									  }
									  
								  ?>
						</div>
				</body>	
			</section>	
			</div>
</html>
<?php
	mysqli_free_result($Recordset1);
?>

