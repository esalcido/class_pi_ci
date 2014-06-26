/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
  
    
 //======================================================================
    //Instructor View.

    $("#clearResults").click(function() {
        //This function will reset the feedback values of jqPlot. 
        $.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "clearResults"},
            complete: function() {
                //try {
                //data = JSON.parse(data.responseText);
                //} catch (e) {
                //    alert(e);
                //}
                $("#alertAdd").slideDown('slow', function() {
                    $("#alertAdd").delay(1000).slideUp('slow');
                });
            },
            success: function() {
                //window.location.href="index.php";
            }

        });

    });
    
    
});


