




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
 <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css"/>
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
      <li class="active"><a href="#">Home</a></li>
      
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="label label-pill label-danger count"></span>Notifications
        </a>
           <ul class="dropdown-menu"></ul>



      </li>
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
         <div id="profile" style="margin-left: 32px; ">
            <div style="margin-left: 73px;">
              <?php 
       
               $username=$_REQUEST['username'];
               echo "welcome ".$username;
        
              ?>
            </div>

        </div>
      
       
    </div>
      
  </div>
  <div class="jumbotron col-sm-12">
      <h3>Third Party Requirement</h3>
      <hr>
      <form id="thirdparty">
           
          <div class="form-group">

<input id="username" type="hidden" class="form-control" value="<?php echo $_POST['username'];?>" style="width:100%" disabled/></div>


          <div class="form-group">
            <label for="tpassword">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="password">
          </div>

         <div class="form-group">
    <label for="num">Mobile number:</label>
    <input type="text" class="form-control" id="num" name="num" placeholder="third party number">
  </div>
<br>

          <input type="button" class="btn btn-block btn-success" name="submit1" id="submit1" value="Send The Link">
          <span id="error_message" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span> 
      </form>
  </div>
        </div>

        <div class="col-sm-9" style="background-color: lavender; height: 600px;">
        
        <div class="col-md-3" style="height: 600px;border: 1px;border-style: solid;">

        <div style="border-style: solid;border:1px;padding-top:10px; background-color: #E8CCC1;">
<caption>Upload Section</caption>
   
       

            <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?php echo $_POST['username'];?>";">
             <select name="document">
  <option selected value="-1">Please Select</option>
  <option value="0">photo</option>
  <option value="1">passport</option>
<option value="2">pan card</option>
<option value="3">voting card</option>
<option value="4">caste certificate</option>
<option value="5">electricity bill</option>
<option value="6">ration card</option>
<option value="7">adhar card</option>
<option value="8">driving license</option>
<option value="9">birth certificate</option>
</select>
              <input type="file" name="fupload" id="fupload">
              <br>
              <input type="submit" name="submit" id="submit" value="upload" class="form-control btn btn-warning">
              <div id="status"></div>
            </form>


</div>
<div class="form-group">
<label for="qr">QR Code:</label>
<input id="text" type="text" class="form-control" value="<?php echo $_POST['username'];?>" style="width:100%" disabled/><br /></div>

 
<div style="width:220px; height:220px; border-style: solid;border:1px;background-color: #C4A2A1;">
<div id="qrcode" style="padding-left: 10px; padding-top: 10px; width:200px; height:200px; margin-top:15px;"></div>
   </div>     




    
  </div>
 <div class="col-md-8" style="height: 600px;border: 1px;border-style: solid; margin-left: 20px;">
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
         <td>no</td>
        <!--<td><a href="#" class="btn btn-primary" role="button">View</a></td>-->
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'0';?>" class="view_data btn btn-primary">
      </tr>
      
      <tr>
        <td>2</td>  
        <td>passport</td>
        <td>no</td>   
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'1';?>" class="view_data btn btn-primary">
        <input type="hidden" name="type" id="type" value="passport"></td>
      </tr>
      
      <tr>
       <td>3</td>
       <td>Pan card</td>
       <td>no</td>
       <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'2';?>" class="view_data btn btn-primary"></td>
         
      </tr>

      <tr>
        <td>4</td>
        <td>voting card</td>
        <td>no</td>
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'3';?>" class="view_data btn btn-primary"></td>
        
      </tr>
      <tr>
        <td>5</td>
        <td>Caste Certificate</td>
        <td>no</td>
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'4';?>" class="view_data btn btn-primary"></td>
       
      </tr>
      <tr>
        <td>6</td>
        <td>Electricity Bill</td>
        <td>no</td>
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'5';?>" class="view_data btn btn-primary"></td>
        
      </tr>
      <tr>
        <td>7</td>
        <td>Ration Card</td>
        <td>no</td>
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'6';?>" class="view_data btn btn-primary"></td>
         
      </tr>
      <tr>
        <td>8</td>
        <td>Adhar Card</td>
        <td>no</td> 
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'7';?>" class="view_data btn btn-primary"></td>
         
      </tr>
      <tr>
        <td>9</td>
        <td>Driving License</td>
        <td>no</td>
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'8';?>" class="view_data btn btn-primary"></td>
        
      </tr>

      <tr>
        <td>10</td>
        <td>Birth Certificate</td>
        <td>no</td>
        <td><input type="button" name="view" value="view" id="<?php echo $_POST['username'].'9';?>" class="view_data btn btn-primary"></td>
        
      </tr>
   </tbody>
  
</table>
        </div>
   </div>
</div>


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
  var elText = document.getElementById("text").value;
  var elText=elText+"/";
  var elText="digitaldocs.000webhostapp.com/uploads/"+elText;
 // alert(elText);
  if (!elText) {
    alert("Input a text");
    elText.focus();
    return;
  }
  
  qrcode.makeCode(elText);
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

<div id="dataModal" class="modal fade"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pictorial View</h4>
      </div>
       <div class="modal-body" id="image">
         
       </div>
       <div class="modal-footer">
         <button type="button" class="close" data-dismiss="modal">close</button>
       </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
     
        //var username=$("#username").val();
    $('.view_data').click(function(){

    // var type=$('#type').val();
      var username=$(this).attr("id");
      
      var type=username.slice(-1);
      var username=username.slice(0,-1);
//alert(username);
     // alert(type);

     $.ajax({
      url:"view.php",
      method:"post",
      data:{username:username,type:type},
      success:function(data){
        $('#image').html(data);
$('#dataModal').modal('show');
      }
     })
      
    })
  })
      </script>





<script>  
 $(document).ready(function(){  
  $('#thirdparty').bootstrapValidator({
//       live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          password :{
            group:'.form-group',
              validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
               remote: {
                        type: 'POST',
                        url: 'chkpwd.php',
                        message: 'The password is not available'
                    },
                }
          }
        }
      });









      $('#submit1').click(function(){  
           var password = $('#password').val();  
           var number = $('#num').val();
           
           //var username=document.getElementsByName('username').value;
          // alert(password);
          var username=$('#username').val();
       // var username=$(this).attr("id"); 
          alert(username);
          alert(number);
           if(password == '' || number == '' || username =='')  
           {  
                $('#error_message').html("All Fields are required");  
           }  
           else  
           {  
                $('#error_message').html('');  
                $.ajax({  
                     url:"otp1.php",  
                     method:"POST",  
                     data:{password:password, number:number,username:username},  
                     success:function(data){  
                          $("form").trigger("reset");  
                          $('#success_message').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#success_message').fadeOut("Slow");  
                          }, 2000);  
                     }  
                });  
           }  
      });  
 });  
 </script>  

