<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <br>
    <div class="container">
     <div id="slickQuiz">
            <h1 class="quizName"><!-- where the quiz name goes --></h1>

                <div class="quizArea">
                    <div class="quizHeader">
                        <!-- where the quiz main copy goes -->

                        <a class="button startQuiz" href="#">Get Started!</a>
                    </div>

                    <!-- where the quiz gets built -->
                </div>

                <div class="quizResults">
                    <h3 class="quizScore">You Scored: <span><!-- where the quiz score goes --></span></h3>

                    <h3 class="quizLevel"><strong>Ranking:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

                    <div class="quizResultsCopy">
                        <!-- where the quiz result copy goes -->
                    </div>
                </div>

                <!--<script src="<?php echo base_url(); ?>Public/SlickQuiz/js/jquery.js"></script>-->
                <script src="<?php echo base_url(); ?>Public/SlickQuiz/js/slickQuiz-config.js"></script>
                <script src="<?php echo base_url(); ?>Public/SlickQuiz/js/slickQuiz.js"></script>
                <script src="<?php echo base_url(); ?>Public/SlickQuiz/js/master.js"></script>

            </div><!--end slickQuiz-->
    </div>
</div>

<div class="container">

    <!-- Example row of columns -->
    <div class="row">
        <div class="col-lg-4">
            
            <button type='button' name='getdata' id='getdata'>Get Data</button>

            <div id='result_table' >test</div>
            json<?php  echo json_encode($json);  ?>
        </div><!--end col-lg-4-->

    </div>

