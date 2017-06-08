<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>

    <!-- Include the FontAwesome CSS if you want to use feedback icons provided by FontAwesome -->
    <!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />-->

    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
</head>
<body>

<div style="padding-top: 5%;">
  <!--<button type="button" class="btn btn-danger" style="padding-left: 15%;padding-right: 15%; text-align: center;" data-toggle="popover">Send The QR code Link</button>-->
    <a data-placement="left" data-toggle="popover" data-title="Third party Requirement" data-container="body" type="button" data-html="true" href="#" id="login" class="btn btn-danger" style="padding-left: 15%;padding-right: 15%; text-align: center;" >Send The QR code Link</a>

<div id="popover-content" class="hide">
      <form >
          <div class="form-group">
                      <input type="hidden" name="username" value="<?php echo $_POST['username'];?>";">

          <label for="password">Password:</label>
          <input placeholder="Username password" class="form-control" maxlength="5" type="password" id="password" name="password">
          </div>
          <div class="form-inline">
            <label for="party">Third Party Username:</label>
            <input type="text" name="party" class="form-control" id="party">
          </div>
          <div class="form-group">
            <label for="number">Third Party Number:</label>
            <input type="text" name="tnumber" class="form-control" id="tnumber">
          </div>
          <br>
         <input type="button" name="send" id="send" value="send" class="btn btn-danger">                                  
        </div>
        <span id="success"></span>
      </form>
    
  </div>
</body>
</html>


<script>
  $(document).ready(function(){
  $("#send").click(function(){
    var password=('#password').val();
    alert(password);
    var party=('#party').val();
    alert(party);
   $.ajax({
   url:"otp1.php";
   method:"post";
   data:{username:username;password:password;party:party;tnumber:tnumber},
   success:function(data){
    ("#success").html(load);
   }    
   }
   })
});
});
</script>
