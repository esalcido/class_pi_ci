/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
  
    
 //==========================================================================================
    //MakeQuiz View
    //
    //fade in the quiz.
    $('#quizJumbo').fadeIn(2000);

    //When the instrusctor clicks on 'enter' to create a new quiz, it will load the form for entering 
    //the question
    $("#makeQuiz").click(function() {

        //var quizName = $('#quizName').val();
        //var questionNumber = $('#questionNum').val();

        //alert(quizName +" "+ questionNumber);
        var ser = $('#create-quiz-form').serialize();
        //alert(ser);

        $.ajax({
            type: "GET",
            url: "includes/request.php",
            data: {"action": "displayCreateQuizForm", "quizSer": ser},
            complete: function(data) {
                data = JSON.parse(data.responseText);
                console.log(data);

                quizExists(data);


            }
        });

    });
    //Once the data comes back from the back end, and is fed to this function, it will check to see if the name of quiz
    //exists and if it does, it will fail and it will display an error message.  If it does not exist, it will check
    //to see if the value is not empty.  If it is not, it will then display the quiz form.
    function quizExists(data) {
        if (data.status === "fail") {
            $('#quizExists').slideDown('slow', function() {
                $("#quizExists").delay(2000).slideUp('slow');
            });

        }
        else {
            if (data.questionNum !== "") {
                //display the form to fill out the quiz
                displayQuizForm(data);
            }
            else {
                //display error message
                $('#quizError').slideDown('slow', function() {
                    $("#quizError").delay(2000).slideUp('slow');
                });
            }

        }
    }
    //==================================================================================================================
    //this function, once it has been validated, will print out the form according to the number of questions
    //the user has selected.
    function displayQuizForm(data) {

        //variable j for adjusting off-by-one
        var j = 0;

        //printing the quiz-form
        var form = $('<form id="quiz-form" ></form>');
        $("#quiz-form1").html(form);

        for (i = 0; i < data.questionNum; i++) {
            j++;
            var question = 'Question #' + j + '<br><input type=\"text\" name=\"question' + i + '\" id=\"question' + i + '\" />';
            form.append(question);
            
               var answer = 'Answer: (enter \'t\' or \'f\')<input type=\"text\" name=\"answer_' + i + '\" id=\"answer_' + i + '\" />  <br> ';
            //var answer = "Answer: <select >";
//                answer +="<option name=\"answer_' + i + '\" value=\"true\">True</option>";
//                answer +="<option name=\"answer_' + i + '\" value=\"false\">False</option>";
//                
//                answer +="</select><br>";
                
            form.append(answer);
        }
        var submit = "<input type=\"button\" name=\"submit\" id=\"enterQuiz\" value=\"enter\" /><br><br>";
        form.append(submit);

        //Once quiz-form is printed, hide the previous create-quiz-form
        $('#create-quiz-form').slideUp(1500);


        //submit data from form
        $('#enterQuiz').click(function() {

            var ser1 = $('#quiz-form').serialize();
            //alert(ser1 + " " + data.quizName);

            $.ajax({
                type: "GET",
                url: "includes/request.php",
                data: {"action": "insertQuiz", "quizSer1": ser1, "quizName": data.quizName},
                complete: function(data) {
                    data = JSON.parse(data.responseText);
                    console.log(data);

                    //alert quiz has been inserted or not
                    //quizExists(data);


                },
                success: function() {
                    window.location.href = "index.php";
                }

            });

            //alert('submitted');

        });
    }
    
    
    
});


