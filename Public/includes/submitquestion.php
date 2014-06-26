<!-- calling in the Class for Database -->
<?php
	require_once "Database.php";
	
	session_start();
	
	$db = new Database();
	
	//create an sql statement and set to variable
	$sql = "SELECT * FROM student WHERE id>='1' ";
	
	//apply that sql statement to the $db obect
	$db->query($sql);
	

// questions submitted to database 

$limit= $_SESSION['questionNum'];
$eq;$ans;
if( isset($_POST['submit']) ){
	for ($i=1; $i<=$limit; $i++) { 
		if( isset( $_POST["quest".$i] ) && isset( $_POST["answer".$i] ) ){
			$eq=$_POST["quest".$i];
			$ans=$_POST["answer".$i];
		
		$db->insertNewQuestion($eq,$ans);
 		}
	}
 	$i++;  
	
	echo $_SESSION['questionNum'];
	if( $_SESSION['questionNum']){
	session_destroy();
	}
}

header("Location:../makequiz-ed.php");

 ?>



