<?php
session_start();
 //calling in the Class for Database
	require_once "Database.php";
$db = new Database();

$db->connect();


// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['pass']; 
echo "username: ".$myusername." password: ".$mypassword;
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
//encrypt pass
$mypassword = md5($mypassword);
$sql="SELECT * FROM teacher WHERE name='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("myusername");
$_SESSION['myusername']=$myusername;
//session_register("mypassword"); 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>