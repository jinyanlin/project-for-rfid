<?php
 


$DBNAME = "table";
$DBUSER = "root";
$DBPASSWD = "d0497563";
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
$local = "contract";
mysqli_select_db($conn, $local);
$query_Recordset1 = "SELECT * FROM contract ORDER BY id ASC";
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
<body>
	<h3>
	<?php 
		session_start();
		if(@$_SESSION['username']==null)
		{
			echo ("??????!?????????");
			echo '<a href="index.php">??????</a>';
		}else
		{
			echo $_SESSION['username'];
			echo '????????????:';
			echo '<a href="logout.php">??????</a>';
		}
	?>
</h3>    

<h1 align="center"> ?????????????????????</h1>
<?php
require_once("dbtools.inc.php");
    //??????????????????????????????
    $records_per_page = 15;
			
    //?????????????????????????????????
    if (isset($_GET["page"]))
      $page = $_GET["page"];
    else
      $page = 1;
              
    //??????????????????
    $link = create_connection();
                  
    //?????? SQL ??????
    $sql = "SELECT * FROM contract ORDER BY date DESC";
    $result = execute_sql($link, "table", $sql);
              
    //???????????????
    $total_records = mysqli_num_rows($result);
          
    //???????????????
    $total_pages = ceil($total_records / $records_per_page);
          
    //????????????????????????????????????
    $started_record = $records_per_page * ($page - 1);
          
    //???????????????????????????????????????????????????
    mysqli_data_seek($result, $started_record);

?>


<div align="center">
    <table border="1" table align="center">
      <tr>
        <td align="center" bgcolor="#FF6600">??????(????????????)</td>	
        <td align="center" bgcolor="#FF6600">????????????</td>
        <td align="center" bgcolor="#FF6600">??????</td>
        <td align="center" bgcolor="#FF6600">??????</td>
        <td align="center" bgcolor="#FF6600">??????</td>
        <td align="center" bgcolor="#FF6600">??????</td>

      </tr>
	  <?php do { ?>
        <tr>
          <td><?php echo $row_Recordset1['id']; ?></td>
          <td><?php echo $row_Recordset1['name']; ?></td>
          <td><?php echo $row_Recordset1['email']; ?></td>
          <td><?php echo $row_Recordset1['phone']; ?></td>
          <td><?php echo $row_Recordset1['author']; ?></td>
          <td><?php echo $row_Recordset1['message']; ?></td>
          <!--<td><a href="update.php?id=<?php echo $row_Recordset1['id']; ?>">??????</a></td>
          <td><a href="delete.php?id=<?php echo $row_Recordset1['id']; ?>">??????</a></td>-->
        </tr>
    	<?php } while (@$row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table>
</div>

<div id=downbar>
<?php
//???????????????
      echo "<p align='center'>";
			
      if ($page > 1)
        echo "<a href='index.php?page=". ($page - 1) . "'>?????????</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='index.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='index.php?page=". ($page + 1) . "'>?????????</a> ";			
				
      echo "</p>";
			
      //?????????????????????
      mysqli_free_result($result);
      mysqli_close($link);
    ?> 		
</div>


</body>
</html><?php
mysqli_free_result($Recordset1);
?>

