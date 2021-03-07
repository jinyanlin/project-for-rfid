<?php
    include "config.php";
    // $sql = "SELECT id, RFID, UserName, DateTimee FROM datalog";


    $data =    "SELECT datalog.idlog, datalog.RFID, user.username  ,datalog.datetimee,datalog.location FROM datalog 
            JOIN user ON datalog.RFID=user.RFID";

    $result = $conn->query($data); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>行李位置</title>
  </head>
  <body>
  
        <div class = "container">
            <div class="card text-center" style="margin-top: 50px">
            
                    
                    
                <table class="table">
                    <thead class="thead-dark">
                    
                        <tr>
                        
                            <th scope="col">#</th>
                            <th scope="col">RFID</th>
                            <th scope="col">顧客姓名</th>
                            <th scope="col">更新時間</th>
                            <th scope="col">位置</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                $i = 1;
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$row["RFID"]?></td>
                            <td><?=$row["username"]?></td>
                            
                            <td><?=$row["datetimee"]?></td>
                            <td><?=$row["location"]?></td>
                            </tr>
                                <?php
                                $i++;
                                    }
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>