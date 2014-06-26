/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
  
    //================================================================================================================
//Student View
//here is where we call a selector on the individual feedback buttons and add an event listener that will
//send a request to update the database
 $("#lost").click(function() {
   
$.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "updateFeedback", "button": "lost"},
            complete: function(data) {

                //data = JSON.parse(data.responeText);
                console.log(data);
                //showMessage(data);
            }
        });

});  
$("#bored").click(function() {
   
$.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "updateFeedback", "button": "bored"},
            complete: function(data) {

                //data = JSON.parse(data.responeText);
                console.log(data);

            }
        });

});

  $("#content").click(function() {
   
$.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "updateFeedback", "button": "content"},
            complete: function(data) {

                //data = JSON.parse(data.responeText);
                console.log(data);

            }
        });

}); 

  $("#intrigued").click(function() {
   
$.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "updateFeedback", "button": "intrigued"},
            complete: function(data) {

               // data = JSON.parse(data.responeText);
                console.log(data);

            }
        });

});  

$("#interested").click(function() {
   
$.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "updateFeedback", "button": "interested"},
            complete: function(data) {

                //data = JSON.parse(data.responeText);
                console.log(data);

            }
        });

});
  

function showMessage(data){
    
    
    alert("you have reached the limit.");
}


 //this hides any alerts 
    $(".alert").hide();  
   
//animate and toggle the log in div
    $("#log-in-tag").click(function() {
        $("#instructor-log-in").slideDown("slow").toggle();
    });
    
});


