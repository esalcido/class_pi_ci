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
      
       
        <!--jqplot js-->
		<script type="text/javascript" src="<?php echo base_url(); ?>Public/jqplot/dist/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Public/jqplot/dist/plugins/jqplot.barRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Public/jqplot/dist/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Public/jqplot/dist/plugins/jqplot.pointLabels.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Public/jqplot/dist/jquery.jqplot.min.css" />
        
    
        <script language="javascript" type="application/javascript">
            $(function() {
              
            //jQuery Chart
            //get data from database

                    //var s1 = JSON.parse(data);
                    var s1=['<?php echo $lost; ?>','<?php echo $bored; ?>','<?php echo $content; ?>','<?php echo $intrigued; ?>','<?php echo $interested; ?>'];
                    var ticks = ['', '', '', '', ''];

                    var plot1 = jQuery.jqplot('chart1', [s1], {
                        // The "seriesDefaults" option is an options object that will
                        // be applied to all series in the chart.
                        seriesDefaults: {
                            renderer: $.jqplot.BarRenderer,
                            rendererOptions: {
                                fillToZero: false,
                                varyBarColor: true
                            }
                        },
                        seriesColors: ['#ed9c28', '#d2322d', '#3276b1', '#39b3d7', '#47a447'],
                        // Custom labels for the series are specified with the "label"
                        // option on the series option.  Here a series option object
                        // is specified for each series.
                        series: [
                            {label: 'Student'},
                            // {label:'Lost'},
                            //{label:'Interested'}
                        ],
                        // Show the legend and put it outside the grid, but inside the
                        // plot container, shrinking the grid to accomodate the legend.
                        // A value of "outside" would not shrink the grid and allow
                        // the legend to overflow the container.
                        legend: {
                            show: false
                        },
                        axes: {
                            // Use a category axis on the x axis and use our custom ticks.
                            xaxis: {
                                renderer: $.jqplot.CategoryAxisRenderer,
                                ticks: ticks
                            },
                            // Pad the y axis just a little so bars can get close to, but
                            // not touch, the grid boundaries.  1.2 is the default padding.
                            yaxis: {
                                min: 0, max: 30,
                                pad: 1.05,
                                tickOptions: {formatString: '%d'}
                            }
                        }
                    }); 
                
            });
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
