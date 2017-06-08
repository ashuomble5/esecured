

<?php 
session_start();
$number=$_POST['number'];
$password=$_POST['password'];
$username=$_POST['username'];

$db_host = "localhost"; 

$db_name = "id538870_esecured";
$db_user = "id538870_esecured";
$db_pass = "10254"; 

$con=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//$con=mysqli_connect('localhost','root','','esecured');
$password=mysqli_real_escape_string($con,$password);

$sql="SELECT * FROM user WHERE username='$username'  AND password='$password';";

$result=mysqli_query($con,$sql) or die(mysqli_error());


if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_assoc($result);

if(($number!="91") &&(strlen($number)==10) ){
     $link="digitaldocs.000webhostapp.com/uploads/".$username."/";
  //  $otp=mt_rand(100000,999999);
echo "the QR code link has been send to ".$number." successfully";
   $apikey = "5ecymRxL1U2m1p1DozbXsQ"; 
   $apisender = "TESTIN";
   $msg ="Dear Third party user ".$username." has shared QR code link".$link." <br>";
   $num = $_SESSION['number'];    // MULTIPLE NUMBER VARIABLE PUT HERE...!                 
 
   $ms = rawurlencode($msg);   //This for encode your message content                       
 
$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';
 //echo $url;
 $ch=curl_init($url);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch,CURLOPT_POST,1);
 curl_setopt($ch,CURLOPT_POSTFIELDS,"");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
 $data = curl_exec($ch);
 //echo '<br/><br/>';
 //print($data); /* result of API call*/

//echo "<p style='color:green;'>SUCCESSFUL TRANSACTION</p>";


}
else
{
    echo "plz enter the valid mobile number";
}
}

else
{
	echo "password is incorrect.plz try again.";
}


    ?>

