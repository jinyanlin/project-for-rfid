<?php require_once('Connections/local.php'); ?>
<?php

  $DBNAME = "arduino";
  $DBUSER = "root";
  $DBPASSWD = "";
  $DBHOST = "localhost";
  $local = "user";
  $conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  //$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) //: mysqli_escape_string($theValue);
  //$theValue = mysqli_real_escape_string($conn,$theValue);
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE user SET RFID=%s, username=%s, sex=%s, roomno=%s, checkin=%s, checkout=%s, Nationality=%s , birth=%s, email=%s,  `address`=%s WHERE id=%s",
                       GetSQLValueString($_POST['RFID'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['roomno'], "int"),
                       GetSQLValueString($_POST['checkin'], "date"),
                       GetSQLValueString($_POST['checkout'], "date"),
                       GetSQLValueString($_POST['Nationality'], "text"),
                       GetSQLValueString($_POST['birth'], "date"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['id'], "int"));
/*
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE user SET RFID=%s, username=%s, sex=%s, roomno=%s, checkin=%s, checkout=%s, Nationality=%s, birth=%s, email=%s, `address`=%s, WHERE id=%s",
                       GetSQLValueString($_POST['RFID'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['roomno'], "int"),
					             GetSQLValueString($_POST['checkin'], "date"),
                       GetSQLValueString($_POST['checkout'], "date"),
                       GetSQLValueString($_POST['Nationality'], "text"),
					             GetSQLValueString($_POST['birth'], "date"),
					             GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['address'], "text"),        
					             GetSQLValueString($_POST['id'], "int"));*/

  //mysql_select_db($database_local, $local);
  mysqli_select_db($conn,$local);
  $Result1 = mysqli_query($conn,$updateSQL) or die(mysqli_error($conn));

  $updateGoTo = "member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_select_db($conn,$local);
$query_Recordset1 = sprintf("SELECT * FROM user WHERE id = %s", GetSQLValueString($colname_Recordset1, "string"));
$Recordset1 = mysqli_query($conn,$query_Recordset1) or die(mysqli_error($conn));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
 session_start(); ?>
 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>編輯</title>
  </head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div class = "container">
    <div class="card text-center" style="margin-top: 50px">
		<div class="card-header">
                    <b>檢視旅客</b>
                </div>

<div align="center">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">id:</td>
        <td><?php echo $row_Recordset1['id']; ?></td>
      </tr>
	  <tr valign="baseline">
        <td nowrap="nowrap" align="right">RFID:</td>
        <td><input type="text" name="RFID" value="<?php echo htmlentities($row_Recordset1['RFID'], ENT_COMPAT, 'utf-8'); ?>" size="32"  /></td>
      </tr>
	  
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">客戶名稱</td>
        <td><input type="text" name="username" value="<?php echo htmlentities($row_Recordset1['username'], ENT_COMPAT, 'utf-8'); ?>" size="32"  /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">性別</td>
        <td><input type="text" name="sex" value="<?php echo htmlentities($row_Recordset1['sex'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">房間號碼</td>
        <td><input type="int" name="roomno" value="<?php echo htmlentities($row_Recordset1['roomno'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
	  <tr valign="baseline">
        <td nowrap="nowrap" align="right">入住日期:</td>
        <td><input type="date" name="checkin" value="<?php echo htmlentities($row_Recordset1['checkin'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">退房日期:</td>
        <td><input type="date" name="checkout" value="<?php echo htmlentities($row_Recordset1['checkout'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">國籍</td>
        <td><input type="text" name="Nationality" value="<?php echo htmlentities($row_Recordset1['Nationality'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
	  <tr valign="baseline">
        <td nowrap="nowrap" align="right">生日:</td>
        <td><input type="date" name="birth" value="<?php echo htmlentities($row_Recordset1['birth'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
	  	  <tr valign="baseline">
        <td nowrap="nowrap" align="right">電郵</td>
        <td><input type="text" name="email" value="<?php echo htmlentities($row_Recordset1['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">地址</td>
        <td><input type="text" name="address" value="<?php echo htmlentities($row_Recordset1['address'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
	  <tr valign="baseline">
        <td nowrap="nowrap" align="right">加入日期</td>
        <td><?php echo $row_Recordset1['Date_of_join']; ?></td>
      </tr>
      
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="更新" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
  </form>
  <p>&nbsp;</p>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

<?php
mysqli_free_result($Recordset1);
?>