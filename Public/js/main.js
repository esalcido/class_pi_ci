//Main.js Written by Edward Salcido and Felix Villa.

$(function() {

//this is the ajax request that is run from main.js.  Once the page is ready, it calls this function
//that sends a request to request.php with the parameter action="getQuizzes" which then routes to call the 
//getQuizzes function in functions.php.  Once it gets the data, it sends it back in the form of a JSON object and 
//sends it to the function in this page called displayQuizzes.
    $.ajax({
        type: "GET",
        url: "includes/request.php",
        data: {"action": "getQuizzes"},
        complete: function(data) {
            data = JSON.parse(data.responseText);
            console.log(data);
            displayQuizzes(data);
        }
    });
//======================================================================
//From here, the data is fed in and it is used to display the list of available quizzes 
    function displayQuizzes(data) {

        var select = $('<p>Please Select a Quiz: </p><br><select name=\"selectedQuiz\" ></select>');
        $("#selectQuiz").html(select);
        var option = $('<option></option>');
        select.append(option);
        for (i = 0; i < data.length; i++) {
            var option = $('<option>' + data[i].quiz + '</option>');
            select.append(option);
        }

    }

//======================================================================
//Take Quiz View
//the selector below, adds the "on change" event to the list of available quizzes.  In the same fashion as above, it sends
//data to request.php but this time, it gets the id of the selected quiz and sends it as well. 
//when the request comes back with the data, it sends it to the function displayQuiz below.
    $("#selectQuiz").change(function() {

        //alert("id= " + $("#user-select option:selected").val());
        id = $("#selectQuiz option:selected").val();
        $.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "loadQuiz", "id": id},
            complete: function(data3) {

                data3 = JSON.parse(data3.responseText);
                console.log(data3);

                displayQuiz(data3);

            }
        });

    });


    function displayQuiz(data) {
        $("#selectQuiz").slideUp(1000);


        var form = $('<form id="take-quiz-form"  ></form>');
        $("#quiz").html(form);
        var j = 0;
        for (i = 0; i < data.length; i++) {
            //var div = $('<div class="questionDiv"></div>');

            j++;
            var questionDiv = "<div class=\"questionDiv\"></div>";
            form.append(questionDiv);
            
            var title = "<p><b>Question " + j + "</b></p><br>";
            form.append(title);
            
            var question = "<p>" + data[i].question + "</p>";
            form.append(question);
            
            var answer = "";
           
            answer += "<input type=\"radio\" name=\"answer" + i + "\" id=\"answer" + i + "\" value=\"t\">True <br>";
            answer += "<input type=\"radio\" name=\"answer" + i + "\" id=\"answer" + i + "\" value=\"f\">False <hr>";
            
            form.append(answer);
        }
        var submit = $('<br><input type=\"button\" value=\"Submit\"  name=\"submit\" id=\"enter-quiz-take\"  /></div>');
        form.append(submit);

        $("#quiz").fadeIn(500).css("display", "block");


        //=============================================================Student View: enter quiz
        $("#enter-quiz-take").click(function() {
            
            var querystring = $("#take-quiz-form").serialize();
            event.preventDefault();
            
            
            //validate the quiz radio buttons
            var isValid=true;
            //get number of divs for questions
            var numQuestionDivs = $('.questionDiv').length;
            
            for(i=0;i<numQuestionDivs;i++){
                var checked = $( "input:radio[name=answer"+"0"+"]:checked" ).val();
                if(checked == null){
                    isValid=false;
                    
                }
               
            }
        
            if(!isValid){
                alert("Please answer all questions")
            }
            else{
                //=======================//
                $.ajax({
                    type: "GET",
                    url: "includes/request.php",
                    data: {"action": "submit", "qs": querystring, "quizName":id},
                    complete: function(data) {
                            
                        data = JSON.parse(data.responseText);
                        
                        var wrongAnswers="I'm Sorry...\n";
                         
                             for(var k in data) {
                                
                                if(k.substr(0,8)=="numIndex"){
                                    
                                    wrongAnswers +="Question "+k.substr(8,9)+" is wrong :( \n"  ;
                                    
                                }
//                                else{
//                                    wrongAnswers="Congrats! Perfect Score!"
//                                    break;
//                                }
                           }
                                alert (wrongAnswers);
                                
                    },
                    success: function(data) {
                        window.location.href="takeQuiz.php";
                    }
                    
               });
               
               
             
           }
        });
    
    }

//    //======================================================================
//    //Instructor View.
//
//    $("#clearResults").click(function() {
//        //This function will reset the feedback values of jqPlot. 
//        $.ajax({
//            type: "GET",
//            url: "includes/request.php",
//            data: {"action": "clearResults"},
//            complete: function() {
//                //try {
//                //data = JSON.parse(data.responseText);
//                //} catch (e) {
//                //    alert(e);
//                //}
//                $("#alertAdd").slideDown('slow', function() {
//                    $("#alertAdd").delay(1000).slideUp('slow');
//                });
//            },
//            success: function() {
//                //window.location.href="index.php";
//            }
//
//        });
//
//    });

//=====================================================================================
//this hides any alerts 
    $(".alert").hide();


//    //==========================================================================================
//    //MakeQuiz View
//    //
//    //fade in the quiz.
//    $('#quizJumbo').fadeIn(2000);
//
//    //When the instrusctor clicks on 'enter' to create a new quiz, it will load the form for entering 
//    //the question
//    $("#makeQuiz").click(function() {
//
//        //var quizName = $('#quizName').val();
//        //var questionNumber = $('#questionNum').val();
//
//        //alert(quizName +" "+ questionNumber);
//        var ser = $('#create-quiz-form').serialize();
//        //alert(ser);
//
//        $.ajax({
//            type: "GET",
//            url: "includes/request.php",
//            data: {"action": "displayCreateQuizForm", "quizSer": ser},
//            complete: function(data) {
//                data = JSON.parse(data.responseText);
//                console.log(data);
//
//                quizExists(data);
//
//
//            }
//        });
//
//    });
//    //Once the data comes back from the back end, and is fed to this function, it will check to see if the name of quiz
//    //exists and if it does, it will fail and it will display an error message.  If it does not exist, it will check
//    //to see if the value is not empty.  If it is not, it will then display the quiz form.
//    function quizExists(data) {
//        if (data.status === "fail") {
//            $('#quizExists').slideDown('slow', function() {
//                $("#quizExists").delay(2000).slideUp('slow');
//            });
//
//        }
//        else {
//            if (data.questionNum !== "") {
//                //display the form to fill out the quiz
//                displayQuizForm(data);
//            }
//            else {
//                //display error message
//                $('#quizError').slideDown('slow', function() {
//                    $("#quizError").delay(2000).slideUp('slow');
//                });
//            }
//
//        }
//    }
//    //==================================================================================================================
//    //this function, once it has been validated, will print out the form according to the number of questions
//    //the user has selected.
//    function displayQuizForm(data) {
//
//        //variable j for adjusting off-by-one
//        var j = 0;
//
//        //printing the quiz-form
//        var form = $('<form id="quiz-form" ></form>');
//        $("#quiz-form1").html(form);
//
//        for (i = 0; i < data.questionNum; i++) {
//            j++;
//            var question = 'Question #' + j + '<br><input type=\"text\" name=\"question' + i + '\" id=\"question' + i + '\" />';
//            form.append(question);
//            
//               var answer = 'Answer: (enter \'t\' or \'f\')<input type=\"text\" name=\"answer_' + i + '\" id=\"answer_' + i + '\" />  <br> ';
//            //var answer = "Answer: <select >";
////                answer +="<option name=\"answer_' + i + '\" value=\"true\">True</option>";
////                answer +="<option name=\"answer_' + i + '\" value=\"false\">False</option>";
////                
////                answer +="</select><br>";
//                
//            form.append(answer);
//        }
//        var submit = "<input type=\"button\" name=\"submit\" id=\"enterQuiz\" value=\"enter\" /><br><br>";
//        form.append(submit);
//
//        //Once quiz-form is printed, hide the previous create-quiz-form
//        $('#create-quiz-form').slideUp(1500);
//
//
//        //submit data from form
//        $('#enterQuiz').click(function() {
//
//            var ser1 = $('#quiz-form').serialize();
//            //alert(ser1 + " " + data.quizName);
//
//            $.ajax({
//                type: "GET",
//                url: "includes/request.php",
//                data: {"action": "insertQuiz", "quizSer1": ser1, "quizName": data.quizName},
//                complete: function(data) {
//                    data = JSON.parse(data.responseText);
//                    console.log(data);
//
//                    //alert quiz has been inserted or not
//                    //quizExists(data);
//
//
//                },
//                success: function() {
//                    window.location.href = "index.php";
//                }
//
//            });
//
//            //alert('submitted');
//
//        });
//    }

});