<?php
	require_once "Database.php"; 
	$db = new Database();

$username=$_POST['username'];
$feedback=$_POST['feedback'];


//$query = "INSERT INTO student VALUES('','$username','$feedback')";

//$db->query($query);
$db->insertNew($username,$feedback);
echo $username."  ".$feedback;
echo "<br>you have inserted a student";

header("Location: ../index.php");
//mysql_query($query);
//mysql_close();


?>