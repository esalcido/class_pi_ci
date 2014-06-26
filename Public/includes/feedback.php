<?php
//session_start();
 //calling in the Class for Database
	require_once "Database.php";
$db = new Database();

$db->connect();




// if the input from radio button is not null,save it to selected.
if(isset( $_POST['group1'] )){
	$selected=$_POST['group1']; 
					
	echo "selected = ".$selected;
	
	$sql = "select ".$selected." from interest";
	$db->query($sql);
	
	//get value from db
	while($db->nextRecord()){
 						
		$fb = $db->Record[$selected];
		
	}
	echo " feedback before ".$fb;
	
	//once we have the value from db, we add 1 and update the db with the result
	$fb +=1;
	echo " feedback after ".$fb;
	
	$sql="UPDATE interest SET ".$selected."=\"".$fb."\" ";
	$db->query($sql);
	
	header("Location:../rate-lecture.php");
	
}



?>