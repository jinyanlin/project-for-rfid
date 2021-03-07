<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  //連接資料庫
  //只要此頁面上有用到連接MySQL就要include它
  $DBNAME = "table";
  $DBUSER = "root";
  $DBPASSWD = "";
  $DBHOST = "localhost";
  @$user = $_POST['user'];
  @$pw = $_POST['password'];

  $conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD);
  if (empty($conn)){
    print mysqli_error($conn);
    die ("無法連結資料庫");
    exit;
  }
  if( !mysqli_select_db($conn, $DBNAME)) {
    die ("無法選擇資料庫");
  }
  // 設定連線編碼
  mysqli_query( $conn, "SET NAMES 'utf8'");

  //搜尋資料庫資料
  $sql = "SELECT * FROM guest where username = '$user'";
  $result = mysqli_query($conn,$sql);
  $row = @mysqli_fetch_row($result);

  //判斷帳號與密碼是否為空白
  //以及MySQL資料庫裡是否有這個會員   $row[1] == $username && $row[2] == $userid
  if($user == null || $pw == null || $row[1] != $user || $row[2] != $pw)
  {
        echo '登入失敗!';
      //   echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
  }
  else
  {
    //將帳號寫入session，方便驗證使用者身份
          $_SESSION['username'] = $user;
          echo '登入成功!';
          echo '<meta http-equiv=REFRESH CONTENT=1;url=homepage.php>';
  }
?>