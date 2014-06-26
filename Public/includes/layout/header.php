<?php  
$sitename="ClassPi"; 
$homePage = "index.php";
require_once "includes/Database.php";
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
        <script type="text/javascript" src="js/main.js" ></script>
<!--        <script type="text/javascript" src="js/feedback-chart.js" ></script>-->
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
	
	$sql="SELECT * FROM interest ";
	$db->query($sql);
	
	//getting the values of interest from db.
	while($db->nextRecord()){
		$bored = $db->Record['bored'];
		$interested = $db->Record['interested'];
		$lost = $db->Record['lost'];
		$intrigued = $db->Record['intrigued'];
		$content = $db->Record['content'];
	}
	
	//array in php.  convert to array in js using json_encode.	
	$php_array = array(intval($bored),intval($interested),intval($lost),intval($intrigued),intval($content));
	$js_array = json_encode($php_array);
	
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
        <div class="navbar-collapse collapse">
          <!--<ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          
          <form class="navbar-form navbar-right"  action="includes/checklogin.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-success" name="sign-in">Sign in</button>
          </form>-->
        </div><!--/.navbar-collapse -->
      </div><!--end container-->
    </div><!--end navbar-->