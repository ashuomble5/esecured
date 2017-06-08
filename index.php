<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Download PHP mail with attachment.</title>
<link rel="stylesheet" media="screen" href="calendar.css"  />
<meta name="google-site-verification" content="liGddaK7I8_x0tSdKv36CRi_rMfRt3yMNjILkbOAxxY" />
<link href='http://feeds2.feedburner.com/webinfopedia' rel='alternate' title='Webinfopedia-Learn SEO, Web Designing and Web development easily with example and demos' type='application/rss+xml'/>
<meta name="msvalidate.01" content="1CBFD6FA96646CD69CE09C869B2F6313" />
<META name="y_key" content="2e447c925218040f" />
<link rel="search" type="application/opensearchdescription+xml" href="http://www.webinfopedia.com/classes/opensearch.xml" title="SEO,PHP and Ajax blog" /> 
<meta content="Example for sending PHP mail with attachment. Learn how to Mail with attachment in PHP" name="description"  />
<meta content="PHP mail with attachment, PHP attachment script, download PHP mail with attachment, attachment in PHP, Free PHP attachment Script, Download PHP mail attachment script, PHP, Mail, Php mail, PHP attachment Download" name="keywords"  />
<meta name="author" content="webinfopedia" />
<meta name="copyright" content="webinfopedia.com" />
<meta name="Robots" content="index, follow" />
<meta name="language" content="English" />
<link rel="icon" type="image/x-icon" href="http://www.webinfopedia.com/favicon.ico" />
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22897853-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<style type="text/css">
<!--
body,td,th {font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 12px; 	color: #333;}
body {margin-left:0px;}
.maindiv{ width:690px; margin:0 auto;}
.textbox{ padding:2px 4px; width:200px;}
.submit{ border:solid 1px #008000; background:#008000; color:#FFF; font-weight:bold;}
-->
</style>
</head>
<body>

<div style="text-align:center;">
  <h1 style="color:#CCC;">How to make Calendar in PHP.<a href="http://www.webinfopedia.com/php-mail-with-attachment-script.html" style="color:#F0D7C6; text-decoration:none; font-size:18px;">http://www.webinfopedia.com/php-mail-with-attachment-script.html</a></h1></div>
  
<div class="maindiv">
<div><?php
if ($_SERVER['REQUEST_METHOD']=="POST"){

   // Set the "To" email address
   $to="admin@webinfopedia.com";

	//Subject of the mail
   $subject="Join Us E-mail with Resume attachment";

   // Get the sender's name and email address plug them a variable to be used later
   $from = stripslashes($_POST['name'])."<".stripslashes($_POST['email']).">";
	
	// Check for empty fields
   if(empty($_POST['name'])  || empty($_POST['email']) || empty($_POST['message']))
	{
		$errors .= "\n Error: all fields are required";
	}
	
	// Get all the values from input
	$name = $_POST['name'];
	$email_address = $_POST['email'];
	$message = $_POST['message'];

	// Check the email address
	if (!eregi(	"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email_address))
	{
		$errors .= "\n Error: Invalid email address";
	}

   // Now Generate a random string to be used as the boundary marker
   $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";

   // Now Store the file information to a variables for easier access
   $tmp_name = $_FILES['filename']['tmp_name'];
   $type = $_FILES['filename']['type'];
   $file_name = $_FILES['filename']['name'];
   $size = $_FILES['filename']['size'];

   // Now here we setting up the message of the mail
   $message = "\n\n Name: $name \n\n Email: $email_address \n\nMessage: \n\n $message \n\nHere is your file: $file_name";

   // Check if the upload succeded, the file will exist
   if (file_exists($tmp_name)){

      // Check to make sure that it is an uploaded file and not a system file
      if(is_uploaded_file($tmp_name)){

         // Now Open the file for a binary read
         $file = fopen($tmp_name,'rb');

         // Now read the file content into a variable
         $data = fread($file,filesize($tmp_name));

         // close the file
         fclose($file);

         // Now we need to encode it and split it into acceptable length lines
         $data = chunk_split(base64_encode($data));
     }

      // Now we'll build the message headers
      $headers = "From: $from\r\n" .
         "MIME-Version: 1.0\r\n" .
         "Content-Type: multipart/mixed;\r\n" .
         " boundary=\"{$mime_boundary}\"";

      // Next, we'll build the message body note that we insert two dashes in front of the  MIME boundary when we use it
      $message = "This is a multi-part message in MIME format.\n\n" .
         "--{$mime_boundary}\n" .
         "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
         "Content-Transfer-Encoding: 7bit\n\n" .
         $message . "\n\n";

      // Now we'll insert a boundary to indicate we're starting the attachment we have to specify the content type, file name, and disposition as an attachment, then add the file content and set another boundary to indicate that the end of the file has been reached
      $message .= "--{$mime_boundary}\n" .
         "Content-Type: {$type};\n" .
         " name=\"{$file_name}\"\n" .
         //"Content-Disposition: attachment;\n" .
         //" filename=\"{$fileatt_name}\"\n" .
         "Content-Transfer-Encoding: base64\n\n" .
         $data . "\n\n" .
         "--{$mime_boundary}--\n";

      // Thats all.. Now we need to send this mail... :)
      if (@mail($to, $subject, $message, $headers))
	  {
         ?>
         <div><center><h1>Mail Sent successfully !!</h1></center></div>
         <?php
	  }else
	  {
         ?>
         <div><center>
           <h1>Error !! Unable to send Mail..</h1></center></div>
         <?php
	  }
   }
}
?></div>
<div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div>
  <p><label for="email">Email:</label><br>
<input id="email" name="email" type="text" />
  </p>
  <p>
    <label for="tele">Upload Your Resume:</label><br>
    <input id="tele" name="filename" type="file" />
  </p>
  <p>
    <label for="message">Message:<br></label>
    <textarea cols="71" rows="5" name="message"></textarea>
  </p>
</div>
<input class="formbtn" type="submit" value="Send Message" />
</form>
</div>
</div>
<div style="padding:4px; text-align:right;"><h1><a href="http://www.webinfopedia.com/php-mail-with-attachment-script.html" style="font-weight:bold; color:#FFF; padding:4px 8px; background:#333; text-decoration:none;">Go back to tutorial</a></h1></div>
</body>
</html>
