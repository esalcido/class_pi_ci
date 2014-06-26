<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 

session_start();


?>

<html>
<body>
Login Successful
<?php header("Location:../teacher.php");?>
<a href="logout.php">Logout</a>
</body>
</html>