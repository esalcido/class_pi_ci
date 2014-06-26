<?php

require_once "Database.php";



//=================================================================================================
//update the interest table
function update_interest_table($value) {
    global $db;

    $sql = "select " . $value . " from interest";
    $db->query($sql);
    //get value from db
    while ($db->nextRecord()) {

        $fb = $db->Record[$value];
    }
    //echo " feedback before ".$fb;
    //once we have the value from db, we add 1 and update the db with the result
    $fb +=1;
    //echo " feedback after ".$fb;

    $sql = "UPDATE interest SET " . $value . "=\"" . $fb . "\" ";
    //echo $sql;
    $db->query($sql);
}

//=================================================================================================
//print question form
function printQuestionForm($counter) {

    $str = "<form action=\"includes/submitquestions.php\" method=\"post\" ><br>";
    $str +="<input  type=\"input\" name=\"question1\"  ><br> ";
    $str +="	<input  type=\"input\" name=\"question2\" ><br>";
    $str +="    <input  type=\"input\" name=\"question3\" ><br>";
    $str +="   <input  type=\"input\" name=\"question4\"  ><br>";
    $str +=" <input  type=\"input\" name=\"question5\"  ><br>";
    $str +=" <input  type=\"submit\" name=\"submit\" value=\"Submit\" ><br>";
    $str +=" </form>";

    return $str;
}

//=================================================================================================
function update_graph_value() {
    //once the cookie is set, then go ahead and update the db
    //get the bored value from the form
    if (isset($_POST['bored'])) {
        $bored = $_POST['bored'];
        //update db
        update_interest_table($bored);
        //reset the post variable so that it doesn't update the db on a refresh
    }
    //get the interested value from the form
    if (isset($_POST['interested'])) {
        $interested = $_POST['interested'];
        //update db
        update_interest_table($interested);
    }
    //get the interested value from the form
    if (isset($_POST['lost'])) {
        $lost = $_POST['lost'];
        //update db
        update_interest_table($lost);
    }
    //get the interested value from the form
    if (isset($_POST['intrigued'])) {
        $intrigued = $_POST['intrigued'];
        //update db
        update_interest_table($intrigued);
    }
    //get the interested value from the form
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        //update db
        update_interest_table($content);
    }
}

//end get bored value function 
//=================================================================================
function print_submit_question_form($num) {

    $qN = $_SESSION['quizName'];

    echo "<p>Quiz Name: \"" . $qN . "\"</p><br>";

    echo "<form action=\"includes/submitquestion.php\" method=\"post\">";

    for ($i = 1; $i <= $num; $i++) {

        echo "<input value=\"Question\" name=\"quest" . $i . "\"  > \n";
        echo "<select name=\"answer" . $i . "\">\n";
        echo "	<option value=\"t\">True</option>\n";
        echo "    <option value=\"f\">False</option>\n";
        echo "</select>\n";

        echo "<br>\n";
    } $i++;

    echo "<input type=\"submit\" name=\"submit\" value=\"Submit\" />";
    echo "</form>";
}

//end function
//============================================================================================
function limitAttempts() {
    $limit = 1;
    if (isset($_COOKIE['attempts'])) {
        if ($_COOKIE['attempts'] < $limit) {

            $attempts = $_COOKIE['attempts'] + 1;
            setcookie('attempts', $attempts, time() + 60 * 10);
            //set the cookie for 10 minutes with the number of attempts stored
            //once the cookie is set, then go ahead and update the db
            //get the bored value from the form.  This function is in functions.php
            update_graph_value();
        } else {

            echo '<script type="text/javascript">alert("You Exceeded your voting limit of ' . $limit . ' votes for the next 10 minutes. Please Try again later.");</script>';
            return true;
            
        }
    } else {
        setcookie('attempts', 1, time() + 60 * 10); //set the cookie for 10 minutes with the initial value of 1
    }
    return false;
}

//===New portion that works with main.js and request.php===================================================================

function getQuizzes() {

    $db = new Database();

    $sql = "select distinct quiz from question ";
    //$sql_client .="from  sb_client, sb_invoice ";
    //$sql_client .="where sb_client.id = sb_invoice.client ";
    $loop = $db->query($sql);

    //$alldata = mysql_fetch_array($loop)  ;
    //echo json_encode($alldata);

    $alldata = array();

    while ($row = mysql_fetch_array($loop)) {
        array_push($alldata, $row);
    }
    echo json_encode($alldata);
}

//======================================================================
function loadQuiz($id) {

    $db = new Database();

    $sql_client = "select *  from question where quiz = '" . $id . "' ";
    //$sql_client .="from  sb_client, sb_invoice ";
    //$sql_client .="where sb_client.id = sb_invoice.client ";
    $loop = $db->query($sql_client);

    //$alldata = mysql_fetch_array($loop)  ;
    //echo json_encode($alldata);

    $alldata = array();

    while ($row = mysql_fetch_array($loop)) {
        array_push($alldata, $row);
    }
    echo json_encode($alldata);
}


//========================================================================
function submitForm($qs,$id) {

    $db = new Database();
    $params = array();
    $values = array();
    $alldata = array();
    $jsonData=array();
    $response = array();
    parse_str($_GET['qs'], $values);

//get answers from db so we can compare and get the number of questions correct.
    $sql="select TorF from question where quiz = '".$id."' ";
    $loop = $db->query($sql);
    
    $i=0;
    while ($db->nextRecord()) {
        $alldata['answer'.$i] = $db->Record['TorF'];
        $i++;
    }
    
        //print_r($values);
        
        //print_r($alldata);
   
    $result=array_diff_assoc($values,$alldata);
   //print_r($result);
   //$response = array('msg' => 'message', 'status' => 'pass');
   $j=0;
   
   foreach($result as $key=>$value){
       $j++;
       $numIndex =(int) substr($key,6);
       $numIndex++;
       //echo "Question ".$numIndex." is wrong";
    $response['numIndex'.$numIndex] =$numIndex;
    $response['value'.$numIndex] =$value;
   
      // $response = array($numIndex => $value);
   }
    
    echo json_encode($response);
//echo json_encode($response);
    
}



//==================================
function clearResults() {

    echo "cleared Results";

    $db = new Database();

    $sql = "Update interest SET bored = 0, interested = 0, lost=0,intrigued=0,content=0";
    //$sql=" ";

    echo "sql = " . $sql;
    //$response = array();

    $response = array('msg' => 'message', 'status' => 'pass', 'sql' => $sql);
    echo json_encode($response);
    if ($db->query($sql)) {
        //return response message
        $response = array('msg' => 'message', 'status' => 'pass');
        echo json_encode($response);
    } else {
        //return response message
        $response = array('msg' => 'message', 'status' => 'fail');
        echo json_encode($response);
    }
}

function getChartData() {
    //echo "it worked";

    $db = new Database();

    $sql = "SELECT * FROM interest ";
    $db->query($sql);

    //getting the values of interest from db.
    while ($db->nextRecord()) {
        $bored = $db->Record['bored'];
        $interested = $db->Record['interested'];
        $lost = $db->Record['lost'];
        $intrigued = $db->Record['intrigued'];
        $content = $db->Record['content'];
    }

    //array in php.  convert to array in js using json_encode.	
    $php_array = array(intval($lost),intval($bored), intval($content), intval($intrigued),intval($interested));
    //$js_array = json_encode($php_array);

    echo json_encode($php_array);
}

function updateFeedback($button) {
   
    $LA = limitAttempts();
    
    //if($_COOKIE['attempts']==3){
    if($LA){    
        ;
    }
    else{
        $db = new Database();

        $sql = "select " . $button . " from interest";
        $db->query($sql);
        //get value from db
        while ($db->nextRecord()) {

            $fb = $db->Record[$button];
        }

        $fb +=1;

        $sql = "UPDATE interest SET " . $button . "=\"" . $fb . "\" ";
        $response;
        if ($db->query($sql)) {
            //return response message
            $response = array('msg' => 'message', 'status' => 'pass');
            echo json_encode($response);
        } else {
            //return response message
            $response = array('msg' => 'message', 'status' => 'fail');
            echo json_encode($response);
        }
    
    }
}

function displayCreateQuizForm($qs) {


    $db = new Database();


    //get individual values for quiz name and quiznum
    $params = array();
    //parsing the parameters from the $qs variable into a new array named $params.  Once it is parsed
    //it will be available to store into individual variables.
    parse_str($qs, $params);
    $quizName = $params['quizName'];
    $quizNum = $params['quizNumber-dropdown'];

    //variable that checks if the quizname exists in the database
    $quizNameExists = 0;
    //check to see if the quiz exists
    $sql = "select  quiz from question";
    $db->query($sql);

    //getting the values of interest from db.
    while ($db->nextRecord()) {
        //if it does exist, 
        if ($quizName == $db->Record['quiz']) {
            //set this flag to true 
            $quizNameExists = 1;
            break;
        }
    }
    //if the flag $quizNameExists is false, that means the quiz name may be 
    //added to the database.
    if ($quizNameExists == 1 || $quizName=="") {

        //send back a fail response
        //this will prompt the alert to pop-up
        $response = array('msg' => 'message', 'status' => 'fail');
        echo json_encode($response);
    } else {

        $response = array('msg' => 'message', 'status' => 'true', 'questionNum' => $quizNum, 'quizName' => $quizName);
        echo json_encode($response);
    }

    //echo "\nquizName = " . $quizName . " quizNameExists = " . $quizNameExists;
}

function insertQuiz($quizSer, $qn) {
    //echo $quizSer."\n";
    $db = new Database();

    //this array will hold the parsed string from the serialized form of quizSer
    $params = array();

    $question = array();
    $answer = array();
    $i = 0;
    $j = 0;
    //this will parse the string in quizSer and fill up the array $params with the variables
    parse_str($quizSer, $params);

    //for each variable in params, break the serialized string into key and value
    foreach ($params as $key => $value) {

        //if the substring of the key starts with question, assign it to the question variable
        if (substr($key, 0, 8) == "question") {
            //save it in question array
            $question[$i] = $value;
            $i++;
        }
        //if the substring of the key starts with answer_, assign it to the answer variable
        if (substr($key, 0, 7) == "answer_") {
            //save it in answer array
            $answer[$j] = $value;
            $j++;
        }
    }



    for ($k = 0; $k < count($question); $k++) {
        echo $question[$k] . " " . $answer[$k];

        if ($db->insertNewQuestion($question[$k], $answer[$k], $qn)) {
            //return response message
            $response = array('msg' => 'message', 'status' => 'pass');

            echo json_encode($response);
        } else {
            //return response message
            $response = array('msg' => 'message', 'status' => 'fail');
            echo json_encode($response);
        }
    } 
    
}

function run_chart_db(){
    
    $db = new Database();
	$sql="SELECT * FROM interest ";
	$db->query($sql);
	
	//getting the values of interest from db.
	while($db->nextRecord()){
                $lost = $db->Record['lost'];
                $bored = $db->Record['bored'];
		$content = $db->Record['content'];
                $intrigued = $db->Record['intrigued'];
                $interested = $db->Record['interested'];
		
	}
	
	//array in php.  convert to array in js using json_encode.	
	$php_array = array(intval(intval($lost),$bored),intval($content),intval($intrigued),intval($interested) );
	$js_array = json_encode($php_array);
}
