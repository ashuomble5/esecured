
 <?php

 $fupload = $_FILES["fupload"]["name"];
 $type= $_REQUEST['document'];
$username=$_REQUEST['username'];
        
        


 
$path = "uploads/".$username."/";
//$name = $_FILES["file"]["name"];
// Remove dangerous characters from filename.
$fupload = str_replace('..', '', $fupload);
$fupload = str_replace('/', '', $fupload);
$fupload = str_replace('\\', '', $fupload);
if(!file_exists($path)){
   @mkdir($path);}
if ($type!='-1') {
  # code...

if((($_FILES["fupload"]["type"] == "image/gif")
    || ($_FILES["fupload"]["type"] == "image/jpeg")
    || ($_FILES["fupload"]["type"] == "image/png")
    || ($_FILES["fupload"]["type"] == "image/jpg")
&& ($_FILES["fupload"]["size"] < 5000000)) ){
      if ($_FILES["fupload"]["error"] > 0) {
        echo "Error " . $_FILES["fupload"]["error"] . "<br>";
      } else {
                       
           // @mkdir($path, 0666, true);  // Create non-executable upload folder(s) if needed.
         // @mkdir(uploads."/".$username);
    move_uploaded_file($_FILES["fupload"]["tmp_name"],"uploads/".$username."/".$_FILES["fupload"]["name"]);
    

            $conn = mysqli_connect('localhost','root','');
            
            if(!$conn){
                die("Unable to connect to database server: ".mysqli_connect_error($conn));
            }
            
            if(!mysqli_select_db($conn,'esecured')){
                die("Failed to select Database: ".mysqli_error($conn));
            }
            
            $sql="INSERT INTO document (fupload,type,username) VALUES ('$path$fupload','$type','$username')";
            if(!mysqli_query($conn,$sql)){
                echo "<center><div style='background-color:pink'>Failed to insert record</div></center><br><br>";
               
                exit();             
            }
            else{
               
               include("profile.php");
              //  exit();             
            }
            
            
        }
   
   //  header("location:profile.php");   

  }
}


?>