<?php
session_start();  // 啟用交談期
$username = "";
$RFID = "";
$msg = "";
// 取得表單欄位
if (isset($_POST["Username"]))
   $username = $_POST["Username"];
if (isset($_POST["Password"]))
   $RFID = $_POST["Password"];
// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $RFID != "") {
   // 建立MySQL伺服器連接
   $db = mysqli_connect("localhost","root","d0497563");
   mysqli_select_db($db, "arduino"); // 選擇資料庫
   // 建立SQL指令字串
   $sql = "SELECT * FROM user WHERE RFID='";
   $sql.= $RFID."' AND username='".$username."'";
   $rows = mysqli_query($db, $sql); // 執行SQL指令字串
   // 是否查詢到記錄
   if (mysqli_fetch_row($rows) != false) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      $_SESSION["username"] = $username;
	  //header("Location: servicedel_finish.php");  // 轉址至首頁
	  echo '<meta http-equiv=REFRESH CONTENT=2;url=servicedel_finish.php>';
   } else
      $msg =  "使用者名稱或密碼錯誤!<br/>";

   mysqli_close($db);  // 關閉伺服器連接
}
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
	<title>登入網站</title>

	   <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input,.sumbit[type=button]{
	width: 125px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/prefixfree.min.js"></script>
	
	
	
	
	
	

</head>


<body>
<form action="valid.php" method="post">


<h2>輸入使用者名稱和密碼登入網站</h2><hr/>


<div class="body"></div>
		<div class="header">
			<div>RFID<span>驗證</span></div>
		</div>
		<br>
		<div class="login">
		
				<input type="text" placeholder="username" name="Username" size="19" maxlength="20"><br>
                <div class="col-sm-6">
                    <input type="text" placeholder="RFID" name="Password" size="20" maxlength="20" id="RFID" readonly name="Password" >
                    <button  type="button" class="btn btn-info mb-2" id="readRFID">Read RFID</button>
                 </div>
				<input type="submit" value="驗證"><br/><br/>
		</div>







</form>
<p><?php echo $msg; ?></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<script>
  $(document).ready(function(){
        $("#readRFID").click(function() {
            $.get("readlast.php", function(data, status){
                var tag = JSON.parse(data);
                $("#RFID").attr("value",tag.id);
            });
        });
    });
  </script>
 
</body>
</html>