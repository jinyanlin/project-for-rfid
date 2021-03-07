<?php
header("Access-Control-Allow-Origin: *");
include "config.php";

    $username = (isset($_GET['username']))? $_GET['username'] : "unsuccess";
	$sex = (isset($_GET['sex']))? $_GET['sex'] : "unsuccess";
	$Nationality = (isset($_GET['Nationality']))? $_GET['Nationality'] : "unsuccess";
	$birth = (isset($_GET['birth']))? $_GET['birth'] : "birth";
	$email = (isset($_GET['email']))? $_GET['email'] : "unsuccess";
	$address = (isset($_GET['address']))? $_GET['address'] : "unsuccess";

	$checkin = (isset($_GET['checkin']))? $_GET['checkin'] : "unsuccess";
	$checkout = (isset($_GET['checkout']))? $_GET['checkout'] : "unsuccess";
	$roomno = (isset($_GET['roomno']))? $_GET['roomno'] : "unsuccess";
    $RFID = (isset($_GET['RFID']))? $_GET['RFID'] : "unsuccess";

    
    $sql = "INSERT INTO `user`( `username`, `sex`, `Nationality`, `birth`, `email`, `address`, `checkin`, `checkout`, `roomno`, `RFID`) VALUES ( '$username', '$sex', '$Nationality', '$birth', '$email', '$address', '$checkin', '$checkout', '$roomno', '$RFID')";
    $result = $conn->query($sql);

    // echo $result;
?>