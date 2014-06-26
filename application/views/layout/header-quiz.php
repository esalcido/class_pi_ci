<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]--><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title;  ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
 <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>Public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Public/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Public/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Public/css/main.css">

        <script src="<?php echo base_url(); ?>Public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
      
       <!--slick quiz-->
       <link href="<?php echo base_url(); ?>Public/SlickQuiz/css/reset.css" media="screen" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Public/SlickQuiz/css/slickQuiz.css" media="screen" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>Public/SlickQuiz/css/master.css" media="screen" rel="stylesheet" type="text/css">
    
        
        <!-- ajax code  -->
        <script type="text/javascript">


            $(document).ready(function () {
                
                $("#getdata").click(function(){
                    $.ajax({
                        url:"<?php echo base_url(); ?>site/ajax_call",
                        type:"POST",
                        dataType:"json",
                        error: function(){
                            $("#result_table").append("<p>yo error</p>");


                        },
                        success: function(results){
                            $("#result_table").append("<p>hello world</p>" + results);
                            alert("test");
                        }
                    });
                });
            });


        </script>
        <!-- end ajax code-->
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
