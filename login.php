<?php

/* for connecting 000 webhost
$db_host = "localhost"; 
$db_name = "id538870_esecured as your database name";
$db_user = "id538870_esecured ur databse uername ";
$db_pass = "10254 db password"; 


$con=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 */

$con=mysqli_connect('localhost','root','');
if(!$con)
{
	echo "database not connected";
}

mysqli_select_db($con,'esecured') or die(mysqli_error($con));


$username=$_REQUEST['username'];
$username=mysqli_real_escape_string($con,$username);

//$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$password=mysqli_real_escape_string($con,$password);
//echo "$username";echo "$email"; echo "$password";or email='$email'
$sql="SELECT * FROM user WHERE username='$username'  AND password='$password';";
$result=mysqli_query($con,$sql) or die(mysqli_error());


if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_assoc($result);

//include_once('invalid.html');
//$_SESSION['user_name']=$row['username'];
//$_SESSION['id']=$row['id'];
//echo"welcome ".$_SESSION['user_name']."<br>";
session_start();



include("profile.php");
}
else
{

echo '<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width-device-width , inital-scale=1">
  <meta name="description" content="E secured Documents and sharing via QR code">
  <meta name="author" content="Ashutosh">
  <title> E secured Documents</title> 
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style1.css"></head>
</head>




<body>
 <div class="jumbotron" id="box-wrapper">
      

          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
               <div class="container-fluid">
                  <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-container">
                          <span class="sr-only">Show and Hide</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>

                       </button>
                      <a href="#" class="navbar-brand">
                          <img src="img/logo.png" class="img-responsive" height="30px" width="45px"/>
                      </a>

                  </div>
                    <div class="collase navbar-collapse" id="navbar-container">

                     <ul class="nav navbar-nav">
                      <li class="active"><a href="login.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-book"></span> about us</a></li>


                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-question-sign"></span> contact us<span class="caret"></span></a>
                
                      <ul class="dropdown-menu" role="menu"><li><a href="callto:8850152980"><span class="glyphicon glyphicon-phone"> Phone</span></a></li>
       <li><a href="mailto:https://digitaldocs.000webhostapp.com"><span class="glyphicon glyphicon-comment"> Email</span></a></li>
                         
                      </ul>
                   
                      </li>
                       </ul>
                    </div>
                  </div>
          </nav>




             
    </ul>
     <div class="container">
        <div class="row">
            <div class="wrap-login col-md-4 col-md-offset-4">
        <h2 style="margin-bottom: 30px;" >E-Secured Login</h2>

         <div class="alert alert-warning" >Invalid Username OR Password</div>
        <form action="login.php" method="POST" name="myform" id="myform" onsubmit="return validator()"> 

    <label for="Username">Username</label>
    <input type="text" class="form-control" id="username" name ="username" placeholder="Username" required>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn-login btn btn-default">Login</button>

 <button type="button" class="btn btn-link">Forgot password?</button>

 <div class="d-sm-none">
            <a href="register.html" class="btn btn-info btn-block" rel="nofollow">Register</a>
          </div>
   <!--<div>
    <button type="submit" class="btn btn-info btn-block " >Register </button>   </div>-->
</form>
      </div>
        </div>
     </div>
 </div>  </div>

</body>





</html>';


}
//session_destroy();
?>