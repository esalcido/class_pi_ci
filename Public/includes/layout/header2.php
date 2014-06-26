<?php  
//this header does not have the code for jqplot
	$sitename="ClassPi"; 
	$homePage = "index.php";
        require_once "includes/Database.php";
        $db = new Database();
        session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]--><head>
        <meta charset="utf-8">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $sitename;  ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
 <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
<!--        <script class="include" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
        
<!--        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>-->
        <script type="text/javascript" src="js/main.js" ></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

		<style type="text/css">
	    #quizButton, #class       {text-align:center;}
		#teacherButton       {text-align:right;
		                      padding-right:5em;
							  padding-bottom:5em;}
	 </style>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            
    </head>
    
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $homePage;  ?>"><?php echo $sitename; ?></a>
        </div>
        <div class="navbar-collapse collapse">
         
        </div><!--/.navbar-collapse -->
      </div><!--end container-->
    </div><!--end navbar-->