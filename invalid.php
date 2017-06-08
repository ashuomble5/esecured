<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>

    <!-- Include the FontAwesome CSS if you want to use feedback icons provided by FontAwesome -->
    <!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />-->

    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
<script type="text/javascript" src="qrcode.js"></script>

</head>

<style>
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
<body>

<nav class="navbar navbar-fixed-top" style="background-color: #C3D1D6;margin:5px;">


<ul class="nav navbar-nav">
      <li class="active"><a href="profile.php">Home</a></li>
      
    </ul>
<ul class="nav navbar-nav navbar-right" style="padding-right: 5px;">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;logout</a></li>
      </ul>
    </nav>
    <div class="container-fluid" style="padding-top: 4.3%;">
   <div class="row content">
        <div class="col-sm-3 sidenav">
 <div class="media">
    <div class="media-left " >
      <img src="img/man.png" class="media-object" style="width:80px;padding-top: 10px;margin-left: 112px;">
      <div id="profile" style="border-style: solid; border:1px;height: 250px;width: 250px;margin-left: 25px; background-color:#D7CADB;">
      <div style="margin-left: 73px;">
        <?php 
       
       $username=$_REQUEST['username'];
        echo "welcome ".$username;

        ?>
      </div>

      </div>
    </div>
      
    </div>
        </div>




        <div class="col-sm-9" style="background-color: lavender; height: 550px;">
        
        <div class="col-md-3" style="height: 550px;border: 1px;border-style: solid;">
        <div style="border-style: solid;border:1px black; background-color: red;">
       
</select>

            <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?php echo '$username';?>">
             <select name="document">
  <option selected value="0">Please Select</option>
  <option value="1">photo</option>
  <option value="2">passport</option>
<option value="3">pan card</option>
<option value="4">voting card</option>
<option value="5">caste certificate</option>
<option value="6">electricity bill</option>
<option value="7">ration card</option>
<option value="8">adhar card</option>
<option value="9">driving license</option>
<option value="10">birth certificate</option>

              <input type="file" name="fupload" id="fupload">
              
              <input type="submit" name="submit" id="submit" value="upload">
              <div id="status"></div>
              
          
            </form>
</div>

    <input id="text" type="text" name="username" value="digitaldocs.000webhostapp.com" style="width:100%" /><br />
<div id="qrcode" style="width:200px; height:200px; margin-top:15px;"></div>
        </div>


        <div class="col-md-8" style="height: 550px;border: 1px;border-style: solid; margin-left: 20px;">
          <table class = "table table-bordered">
   <caption>E-Secured Database</caption>
   
   <thead style="background-color: #E8E8C8;">
      <tr>
         <th>#</th>
         <th>Document name</th>
         <th>Signed</th>
         <th>view</th>
         <th>select</th>
      </tr>
   </thead>
   
   <tbody>
      <tr>
         <td>1</td>
       <td>photo</td>
         
      </tr>
      
      <tr>
        <td>2</td>  
        <td>passport</td>     
      </tr>
      
      <tr>
       <td>3</td>
       <td>Pan card</td>
      </tr>

      <tr>
        <td>4</td>
        <td>voting card</td>
      </tr>
      <tr>
        <td>5</td>
        <td>Caste Certificate</td>
      </tr>
      <tr>
        <td>6</td>
        <td>Electricity Bill</td>
      </tr>
      <tr>
        <td>7</td>
        <td>Ration Card</td>
      </tr>
      <tr>
        <td>8</td>
        <td>Adhar Card</td>
      </tr>
      <tr>
        <td>9</td>
        <td>Driving License</td>
      </tr>
      <tr>
        <td>10</td>
        <td>Birth Certificate</td>
      </tr>
   </tbody>
  
</table>
        </div>
   </div>
</div>
}







<script>
  $(document).ready(function(){
     $("#submit").click(function(){
         $("#status").html("successfully uploaded");
     });
  });
</script>

<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
  width : 200,
  height : 200
});

function makeCode () {    
  var elText = document.getElementById("text");
  
  if (!elText.value) {
    alert("Input a text");
    elText.focus();
    return;
  }
  
  qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
  on("blur", function () {
    makeCode();
  }).
  on("keydown", function (e) {
    if (e.keyCode == 13) {
      makeCode();
    }
  });
</script>
</body>


</html>
