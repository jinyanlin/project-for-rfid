<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>雨傘租借系統</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
</head>
<body>

<!-- Header -->
<div id="header">
		<div class="container"> 
			
			<!-- Logo -->
			<div id="logo">
				<h1><a href="#">旅館服務與預付系統</a></h1>
				<span>Design by LIN/span>
			</div>
			
			<!-- Nav -->
			<nav id="nav">
				<ul>
					<li><a href="homepage.php">首頁</a></li>
					<li><a href="product_buy.php">客房服務</a></li>
					<li><a href="navigation.html">館內設施導航</a></li>
					<li><a href="contact.php">聯絡我們</a></li>
					<li class="active"><a href="service.php">雨傘租借服務</a></li>
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
					}
					else
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
        <?php
			
			include("mysql_connect.inc.php");
			$conn=mysqli_connect("localhost","root","d0497563","table");
			$data=mysqli_query($conn,"select total from umbrella");//從member中選取全部(*)的資料
			//$deldata=mysqli_query($conn,"DELETE FROM umbrella where user=$user");//從member中選取全部(*)的資料
        ?>
				
			<div class="9u skel-cell-important">
				<section id="content" >
					<header>
						<h2>雨傘租借服務</h2>
					</header>
					<body>
						<div class="container-contact100">
							<div class="wrap-contact100">
								<form class="contact100-form validate-form" action="<?php 
									if($_SESSION['username']!=null){
										echo 'service_finish.php';
									}?>"  method="post">
									
							</div>
                        <table>
                         <tr>
                           <th>目前雨傘數量:
                          
                           <?php
							$total=50;
							$sum=0;
							$i=0;  
							
							while($rs=mysqli_fetch_row($data)){
								$curr=(int)($rs[0]);
								$sum = $sum+$curr;
								$i++;
							}
							$totalsum = $total-$sum;
							$_SESSION['totalsum'] = $totalsum;
							echo $total-$sum;
                            ?>
                            </th>
                       		<hr>
                        </tr>
                            <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Quantity">
								<span class="label-input100">數量 *</span>
								<input class="input100" type="text" name="amount" placeholder="想要租借數量">
							</div>
                        </table>
    
							
						
						<div class="container-contact100-form-btn">
							<button class="contact100-form-btn">
								<span>
									租借
									<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
								</span>
							</button>
						</div>
						</form>
			</div>
						<div class="container-contact100-form-btn">
								<button class="contact100-form-btn">
									<span>
										<a href="valid.php">歸還</a>
										<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
									</span>
								</button>
						</div>
		</body>
	

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
