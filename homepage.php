
<?php session_start();?>

<!DOCTYPE HTML>
<html>
<!--
	<head>
		<title>Synchronous by TEMPLATED</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		
	</head>
	<body>
		<div id="wrapper">
			
			<!-- Header -->
			<div id="header">
				<div class="container"> 
					
					<!-- Logo -->
					<div id="logo">
						<h1><a href="#">旅館服務與預付系統</a></h1>
						<span>Design by LIN</span>
					</div>
					
					<!-- Nav -->
					<nav id="nav">
						<ul>
                        	<li class="active"><a href="homepage.php">首頁</a></li>
							<li><a href="product_buy.php">客房服務</a></li>
							<li><a href="navigation.html">館內設施導航</a></li>
							<li><a href="contact.php">聯絡我們</a></li>
							<li><a href="service.php">雨傘租借服務</a></li>
							<li><a href="buy_all.php">消費紀錄</a></li>
							
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
											<h2>使用者資訊</h2>
											<hr>
										</header>
										<ul class="style1">
										<?php 
											$user = @$_SESSION['username'];
											$DBNAME = "arduino";
											$DBUSER = "root";
											$DBPASSWD = "d0497563";
											$DBHOST = "localhost";
											$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
											$data=mysqli_query($conn,"select roomno from user where username='$user'");

											if(@$_SESSION['username']==null)
											{
												echo ("顧客您好!您尚未<strong>");
												echo '<a href="login.php"> 登入</a></strong><br>';
												echo "(請點選登入按鈕，以便使用飯店服務功能)";
												//echo '/<a href="index_form.html"> 註冊</a>';
											}else
											{
												
												echo '<strong>';
												echo $_SESSION['username'];
												echo '貴賓您好';
												echo '<a href="logout.php"> (登出)</a></strong><br>';
												echo "房號:";
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
									<h2>休閒設施</h2>
									<hr>
								</header>
								<ul class="style1">
									<li class="first"><span class="fa fa-check"></span><a href="#">兒童遊戲室</a>
										<p>多項遊戲設施讓成長中的小孩們能夠盡情遊玩增進與孩子互動時間</p>
									</li><br>
									<li><span class="fa fa-check"></span><a href="#">泳池</a>
										<p>提供高樓層泳池讓顧客邊游泳邊眺望遠景	</p>
									</li><br>
								</ul>
								
							</section>
						</div>
						
						
						<div class="9u skel-cell-important">
							<section id="content" >
								<header>
									
								</header>
								<img src="fcu.jpg" alt="Smiley face" height="300" width="900">
							</section>
						</div>
					</div>

				</div>	
			</div>
</div>

			
   
	</body>
    
</html>
