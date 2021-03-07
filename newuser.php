<?php
    include "config.php";
    $sql = "SELECT id, RFID, UserName, DateTimee, Nationality, roomno, email, address, checkin, checkout, birth, sex FROM datalog";


    $data =    "SELECT datalog.idlog, datalog.RFID, user.username, user.sex, user.Nationality, user.birth, user.email, user.address, user.checkin, user.checkout, user.roomno  FROM datalog 
            
			JOIN user ON datalog.RFID=user.RFID;";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>建立訂房</title>
  </head>
  <body>
        <div class = "container">
            <div class="card text-center" style="margin-top: 50px">
                <div class="card-header">
                    <b>旅客資料</b>
                </div>
                <div class="card-body">
                    <form id="form">
					
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">姓名</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="username" id="user">
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">性別</label>

							<div class="col-sm-6">
                                <input type="radio" name="sex" value="Male" id="user">男
								<input type="radio"  name="sex" value="Female" id="user">女
                            </div>
							
							
                        </div>
						
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">國籍</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Nationality" id="user">
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">出生日期</label>
                            <div class="col-sm-6">
                                <input type="date" placeholder="2014-09-18" class="form-control" name="birth" id="user">
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">電郵</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="email" id="user">
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">住址</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address" id="user">
                            </div>
                        </div>
						
						
						<div class="card-header">
                    <b>訂房資料</b>
                </div>
                <div class="card-body">
                    <form id="form">
											
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">入住日期</label>
                            <div class="col-sm-6">
                                <input type="date" placeholder="2014-09-18" class="form-control" name="checkin" id="user">
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">退房日期</label>
                            <div class="col-sm-6">
                                <input type="date" placeholder="2014-09-18" class="form-control" name="checkout" id="user" >
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">房號</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="roomno" id="user">
                            </div>
                        </div>
												
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">RFID UID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="RFID" readonly name="RFID">
                            </div>
                            <div>
                                    <button  type="button" class="btn btn-info mb-2" id="readRFID">Read RFID</button>
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <div class="col-md-5">
                                <button class="btn btn-primary mb-2" type="submit" id="submituser">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
						
						
						
						
						
                    </form>
                </div>
				
                <div class="card-footer text-muted">
                    <div class="text-right">
                        Create by Davy
                    </div>
                </div>
            </div>

        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    <script>
    $(document).ready(function(){
        $("#readRFID").click(function() {
            $.get("readlast.php", function(data, status){
                var tag = JSON.parse(data);
                $("#RFID").attr("value",tag.id);
            });
        });

        $("form").submit(function(event){
            event.preventDefault();
            var dataGet = $(this).serialize();
            $.get("createUser.php", dataGet, function(data, status){
                if(status){
                    alert("save successful");
                    window.location.href = 'http://localhost/THAI/index.html'; 
                }
            });
        });
    });
    </script>
</body>
</html>