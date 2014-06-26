/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
  
    
    //========================================================================================
//jQuery Chart


    $.ajax({
        type: "GET",
        url: "includes/request.php",
        data: {"action": "getChartData"},
        complete: function(data) {
            //data = JSON.parse(data.responseText);
            data = data.responseText;
            console.log(data);
            displayChart(data);
        }
    });
    function displayChart(data) {
      
        var s1 = JSON.parse(data);

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
    }
    
    
    
    
    
});


