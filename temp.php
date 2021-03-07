<?php
header("Access-Control-Allow-Origin: *");

    
    $RFID = (isset($_GET['RFID']))? $_GET['RFID'] : "unsuccess";
    
    $conn = mysqli_connect("localhost","root","d0497563","arduino");
    $sql = "UPDATE rfidtag SET RFIDTag='$RFID' WHERE id=1";
    $result = $conn->query($sql);

?>