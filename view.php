<?php
if(isset($_POST["username"]))
{
	$username=$_POST['username'];

	$type=$_POST['type'];
	//echo $username;
  //echo $type;
	$output = '';
	$con= mysqli_connect("localhost","root","","esecured");
	if(!$con)
	{
		die("failed to select");
	}
	$sql="SELECT * FROM document WHERE username='$username' AND type='$type';";
	$result=mysqli_query($con,$sql);
	//echo $result;

	$output .='
     <div class="container">';
     if ($row = mysqli_fetch_assoc($result)) {
     	# code...
     	$output .="
         <div style='width:500px;height:500px;pading-top:20px;padding-left:40px'>
     	 <img src='".$row["fupload"]."' width='450' height='500'padding-left:'40'></div>";
     
	$output .='</div';
	echo $output;}

else
{
	$output.='<div style="color:red;"> <h3>Oops you have not uploaded anything</h3></div>';
	echo $output;
}}

?>