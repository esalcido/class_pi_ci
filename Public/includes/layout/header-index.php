<?php  
$sitename="ClassPi"; 
$homePage = "index.php";
require_once "includes/Database.php";
include "includes/functions.php";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]--><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $sitename;  ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
 <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="js/feedback-chart.js" ></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
      
       
        <!--jqplot js-->
		<script type="text/javascript" src="jqplot/dist/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="jqplot/dist/plugins/jqplot.barRenderer.min.js"></script>
        <script type="text/javascript" src="jqplot/dist/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="jqplot/dist/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="jqplot/dist/jquery.jqplot.min.css" />
        
        <?php
        //this method gets values from the interest table and inserts them into a json array.
        run_chart_db();
 
	?>
        
        <script language="javascript" type="application/javascript">
        
        </script>
        
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
        
      </div><!--end container-->
    </div><!--end navbar-->
    