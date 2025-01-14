<?php 
 $db_name = 'localhost:3306';
 $db_user = 'root';
 $db_pwd = '';
 $db_table_name = 'lnk_shortner';
 

$conn=mysqli_connect($db_name, $db_user, $db_pwd, $db_table_name);
//$conn = mysqli_connect("localhost:3308","root","","lnk_shortner");
	// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  //console.log( "Connected successfully");
  echo("<script>console.log('SQL Database Connected successfully');</script>");
?>