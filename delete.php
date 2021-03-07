<?php require_once('Connections/local.php'); ?>
<?php

  $DBNAME = "table";
	$DBUSER = "root";
	$DBPASSWD = "";
	$DBHOST = "localhost";
  $local = "guest";
  //$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
  $conn = mysqli_connect("localhost", "root", "","table");
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  //$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conn,$theValue) : mysqli_real_escape_string($conn,$theValue);

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

if ((isset($_GET['id'])) && ($_GET['id'] != "") && (isset($_POST['delete']))) {
  $deleteSQL = sprintf("DELETE FROM guest WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysqli_select_db($conn, $local);
  $Result1 = mysqli_query($conn,$deleteSQL) or die(mysqli_error());

  $deleteGoTo = "member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_select_db($conn, $local);
$query_Recordset1 = sprintf("SELECT * FROM guest WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($conn,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
 session_start(); ?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div align="center">
  <form method="post" name="form1" id="form1">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Id:</td>
        <td><?php echo $row_Recordset1['id']; ?></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Username:</td>
        <td><input name="username" type="text" value="<?php echo htmlentities($row_Recordset1['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Userid:</td>
        <td><input name="userid" type="text" value="<?php echo htmlentities($row_Recordset1['userid'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Userid2:</td>
        <td><input name="userid2" type="text" value="<?php echo htmlentities($row_Recordset1['userid2'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Phone:</td>
        <td><input name="phone" type="text" value="<?php echo htmlentities($row_Recordset1['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Address:</td>
        <td><input type="text" name="address" value="<?php echo htmlentities($row_Recordset1['address'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Birth:</td>
        <td><input name="birth" type="text" value="<?php echo htmlentities($row_Recordset1['birth'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Email:</td>
        <td><input type="text" name="email" value="<?php echo htmlentities($row_Recordset1['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Any:</td>
        <td><input name="any" type="text" value="<?php echo htmlentities($row_Recordset1['any'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Checkin:</td>
        <td><input name="checkin" type="text" value="<?php echo htmlentities($row_Recordset1['checkin'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Checkout:</td>
        <td><input name="checkout" type="text" value="<?php echo htmlentities($row_Recordset1['checkout'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input name="delete" type="submit" id="delete" value="刪除" /></td>
      </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
  </form>
  <p>&nbsp;</p>
</div>
<?php
mysqli_free_result($Recordset1);
?>
