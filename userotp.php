<?php

header('Access-Control-Allow-Origin: *'); 
$con = mysqli_connect("localhost","id1148898_saumik","saumik","id1148898_wheelcare"); 
$text="";
$email=$_POST['data'];

$res=mysqli_query($con,"SELECT * FROM usignup WHERE email='$email'");
  $row=mysqli_fetch_array($res);
  
  $count = mysqli_num_rows($res);
  if($count>0)
  {
    echo "This email id is Already registered";
  }
else{

$possible = '23456789bcdfghjkmnpqrstvwxyz';
$text = '';
$i = 0;

while ($i < 5) { 
	$text .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
	$i++;
}

 
    
 
 
    $email_from = "saumikpatel95@gmail.com";
 
    $email_to = $email;//replace with your email
 
 
    $body = 'Email: ' . $email . "\n\n" . 'Message: ' . $text;

			
			
 
 
$success=    mail($email_to, $body, 'From: <'.$email_from.'>');

if($success)		
{
$sql = "insert into otp (email,otp)values('$email','$text')";
	$result= mysqli_query($con,$sql);
	echo "OTP SENT";
}
else{
echo"Invalid Email ID";
}
} 

?>