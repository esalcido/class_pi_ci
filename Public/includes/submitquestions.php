<?php
include "functions.php";

echo "worked";
	/*if(isset($_POST["submit"])){
		for($i=1; $i<6;$i++){
	
			$post = $_POST["question".$i];
			echo $post;	
		}
	}
*/

if( isset($_POST['submit'])){
		
		$count = $_POST['questionNum'];
		
		echo $count;
		
		$questionForm = printQuestionForm($count);
		echo $questionForm;
	}

?>