<?php

include "functions.php";

if (!isset($_GET['action'])) {
    return;
}
$action = $_GET['action'];


switch ($action) {

    case "getQuizzes":
        getQuizzes();
        //echo "test";
        break;
    case "loadQuiz":
        loadQuiz($_GET['id']);
        //echo "test";
        break;
    case "submit":
        if (isset($_GET['qs'])  ) {
            $qs = $_GET['qs'];
        }
        if(isset($_GET['quizName'] )){
            $quizName = $_GET['quizName'];
        }
        submitForm($qs,$quizName);
        break;
   case "clearResults":
        clearResults();
        //echo "test";
        break;
    case "getChartData":
        getChartData();
        //echo "test";
        break;
    case "updateFeedback":
        if(isset($_GET['button'] )){
            $button = $_GET['button'];
        }
        updateFeedback($button);
        //echo "test";
        break;
     case "displayCreateQuizForm":
         if(isset($_GET['quizSer'] )){
            $quizSer = $_GET['quizSer'];
        }
         displayCreateQuizForm($quizSer);
        
        //echo "test";
        break;  
    case "insertQuiz":
         if(isset($_GET['quizSer1'])  ){
            $quizSer1 = $_GET['quizSer1'];
            
        }
       if(isset($_GET['quizName'])){
           $qn = $_GET['quizName'];
       }
         insertQuiz($quizSer1,$qn);
        
        //echo "test";
        break;
        
}

