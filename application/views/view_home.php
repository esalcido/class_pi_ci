

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">

     <center>&nbsp;<!--<h1>Welcome to ClassPi</h1>--></center> 

    
    
        <!--Chart -->   
        <div id="limit-reached" class="alert">You Have reached the session limit.</div>
        <div id="chart1" style="height:400px;width:100%; clear:both;  float:left;"></div>  

    <div style="margin-left:60px;">
      <div  id="feedback-form">
        <input class="btn btn-warning" type="submit" name="lost" id="lost" value="Lost" style="width:150px; margin:0px 1%; clear:both;">
        <input class="btn btn-danger" type="submit" name="bored" id="bored" value="Bored"  style="width:150px; margin:0px 5%; clear:both;">
        <input class="btn btn-primary" type="submit" name="content" id="content" value="Content" style="width:150px; margin:0px 1%; clear:both;">
        <input class="btn btn-info" type="submit" name="intrigued" id="intrigued" value="Intrigued" style="width:150px; margin:0px 5%; clear:both;">
        <input class="btn btn-success" type="submit" name="interested" id="interested" value="Interested" style="width:150px; margin:0px 1%; clear:both;">
      </div>
    </div>

    <br />
    <center><p style="font-size:30px;"><a class="btn btn-success" style="width:200px;" href="<?php echo base_url();?>site/displayQuiz" >TAKE QUIZ</a></p></center>
  </div>
</div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-lg-4">

    </div>


    </div>
    <!--log in -->
    <a id="log-in-tag" style="float:right; cursor:pointer; " ><b>INSTRUCTOR LOG-IN</b></a>
    <div id="instructor-log-in" style="clear:both; padding-bottom: 5px;display:none;">
        <?php echo validation_errors(); ?>
        <form class="navbar-form navbar-right"  action="<?php echo base_url(); ?>verifylogin/" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-success" name="sign-in">Sign in</button>
        </form>
    </div><br><br>
  

