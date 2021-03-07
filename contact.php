<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>聯絡我們</title>
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
				<span>Design by TEMPLATED</span>
			</div>
			
			<!-- Nav -->
			<nav id="nav">
				<ul>
					<li><a href="homepage.php">首頁</a></li>
					<li><a href="product_buy.php">客房服務</a></li>
					<li><a href="navigation.html">館內設施導航</a></li>
					<li class="active"><a href="contact.html">聯絡我們</a></li>
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
				<!--<div class="3u">
					<section id="sidebard2">
						<header>
							<h1>
							
							</h1>
						</header>
						
					</section>
				</div>-->
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
					$DBPASSWD = "";
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
							<h2>聯絡我們</h2>
						</header>
						<body>
								<div class="container-contact100">
										<div class="wrap-contact100">
											<form class="contact100-form validate-form" action="contact_finish.php" method="post">
												<!--<span class="contact100-form-title">
													
												</span>
												-->
												<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
													<span class="label-input100">姓名 *</span>
													<input class="input100" type="text" name="name" placeholder="輸入您的全名">
												</div>
								
												<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
													<span class="label-input100">信箱 *</span>
													<input class="input100" type="text" name="email" placeholder="輸入您的信箱 ">
												</div>
								
												<div class="wrap-input100 bg1 rs1-wrap-input100">
													<span class="label-input100">電話</span>
													<input class="input100" type="text" name="phone" placeholder="輸入您的電話">
												</div>
								
												<div class="wrap-input100 bg1 rs1-wrap-input100">
													<span class="label-input100">主題</span>
													<input class="input100" type="text" name="author" placeholder="輸入您的主題">
												</div>

												<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
													<span class="label-input100">建議我們</span>
														<textarea class="input100" name="message" placeholder="您的回覆是我們前進的動力"></textarea>
												</div>

												<div class="container-contact100-form-btn">
													<button class="contact100-form-btn">
														<span>
															送出
															<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
														</span>
													</button>
														</body>
					</section>
				</div>
			</div>
							</form>
		</div>	
	</div>




				<!--<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">評價 *</span>
					<div>
						<select class="js-select2" name="service">
							<option>請選擇</option>
							<option>客房服務</option>
							<option>餐飲服務</option>
							<option>Online Services</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="w-full dis-none js-show-service">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">What type of products do you sell?</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="type-product" value="physical" checked="checked">
							<label class="label-radio100" for="radio1">
								Phycical Products
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio2" type="radio" name="type-product" value="digital">
							<label class="label-radio100" for="radio2">
								Digital Products
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio3" type="radio" name="type-product" value="service">
							<label class="label-radio100" for="radio3">
								Services Consulting
							</label>
						</div>
					</div>

					<div class="wrap-contact100-form-range">
						<span class="label-input100">Budget *</span>

						<div class="contact100-form-range-value">
							$<span id="value-lower">610</span> - $<span id="value-upper">980</span>
							<input type="text" name="from-value">
							<input type="text" name="to-value">
						</div>

						<div class="contact100-form-range-bar">
							<div id="filter-bar"></div>
						</div>
					</div>
				</div>
            -->

				
				</div>
			</form>
		</div>
	</div>



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
