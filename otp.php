<?php 
session_start();

$phone=$_POST['phone'];
if((isset($_POST['phone']))&& (strlen($phone)!=10))
{
    echo "plz enter the valid mobile number";
}

else 
    # code...
{
    $otp=mt_rand(100000,999999);

echo "otp has been send to ".$phone." successfully". $otp;
   $apikey = "5ecymRxL1U2m1p1DozbXsQ"; 
   $apisender = "TESTIN";
   $msg ="Dear customer your login verification code for ".$phone." is ".$otp." <br>";
 //  $num = $_SESSION['phone'];    // MULTIPLE NUMBER VARIABLE PUT HERE...!                 
    
   $ms = rawurlencode($msg);   //This for encode your message content                       
 
$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$phone.'&text='.$ms.'&route=1';
 //echo $url;
 $ch=curl_init($url);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch,CURLOPT_POST,1);
 curl_setopt($ch,CURLOPT_POSTFIELDS,"");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
 $data = curl_exec($ch);
 //echo '<br/><br/>';
 //print($data); /* result of API call*/
 if(isset($_POST['otpn'])){
    $otpn=$_REQUEST['otpn'];
    echo "hi".$chk;
   
 }
//echo "<p style='color:green;'>SUCCESSFUL TRANSACTION</p>";
}






    


    ?>
