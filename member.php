
<?php
$DBNAME = "arduino";
$DBUSER = "root";
$DBPASSWD = "";
$DBHOST = "localhost";

$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD, $DBNAME);


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

$maxRows_Recordset1 = 12;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$database_local="table";
$local = "guest";
mysqli_select_db($conn, $local);
$query_Recordset1 = "SELECT * FROM user ORDER BY id ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($conn,$query_limit_Recordset1) or die(mysql_error());
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


$username=@$_POST['id'];

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>檢視資料</title>
  </head>

<div class = "container">
    <div class="card text-center" style="margin-top: 50px">
		<div class="card-header">
                    <b>檢視旅客</b>
                </div>

	<div class="card-body">
		<div align="center">
		
		<form id="form">
		<table border="1" table align="center">
      <tr>
        <td align="center" bgcolor="#00caca"> # </td>
		<td align="center" bgcolor="#00caca">RFID</td>		
        <td align="center" bgcolor="#00caca">客戶姓名</td>
        <td align="center" bgcolor="#00caca">性別</td>
        <td align="center" bgcolor="#00caca">房間號碼</td>
        <td align="center" bgcolor="#00caca">入住日期</td>
        <td align="center" bgcolor="#00caca">退房日期</td>
        <td align="center" bgcolor="#00caca">國籍</td>
        <td align="center" bgcolor="#00caca">出生日期</td>
        <td align="center" bgcolor="#00caca">信箱</td>
        <td align="center" bgcolor="#00caca">住址</td>
		<td align="center" bgcolor="#00caca">創立日期</td>
        <td align="center" bgcolor="#00caca">修改</td>
        <td align="center" bgcolor="#00caca">刪除</td>

      </tr>
	  <?php do { ?>
        <tr>
		  <td><?php echo $row_Recordset1['id']; ?></td>
          <td><?php echo $row_Recordset1['RFID']; ?></td>
          <td><?php echo $row_Recordset1['username']; ?></td>
          <td><?php echo $row_Recordset1['sex']; ?></td>
          <td><?php echo $row_Recordset1['roomno']; ?></td>
          <td><?php echo $row_Recordset1['checkin']; ?></td>
          <td><?php echo $row_Recordset1['checkout']; ?></td>
          <td><?php echo $row_Recordset1['Nationality']; ?></td>
          <td><?php echo $row_Recordset1['birth']; ?></td>
          <td><?php echo $row_Recordset1['email']; ?></td>
          <td><?php echo $row_Recordset1['address']; ?></td>
		  <td><?php echo $row_Recordset1['Date_of_join']; ?></td>		 
          <td><a href="update.php?id=<?php echo $row_Recordset1['id']; ?>">修改</a></td>
          <td><a href="delete.php?id=<?php echo $row_Recordset1['id']; ?>">刪除</a></td>
        </tr>
    	<?php } while (@$row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
	</table>
	</form>
	</div>
	</div>
	
	
	
		<div class="card-footer text-muted">
                    <div class="text-right">
                        hotel 
                    </div>
                </div>
	</div>
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html><?php
mysqli_free_result($Recordset1);
?>