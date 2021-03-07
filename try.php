<html>
  <body>
   
        
        <label for="password" class="col-sm-2 col-form-label">RFID</label>
		
                <div class="col-sm-6">
                     <input type="text" class="form-control" id="RFID" readonly name="RFID">
                </div>
				
                        <div>
                            <button  type="button" class="btn btn-info mb-2" id="readRFID">Read RFID</button>
                        </div>
                        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
   
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