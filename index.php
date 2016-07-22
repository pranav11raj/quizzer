<?php

  //error_reporting(0); // disable or enable error reporting in php.

  include ("database.php");

?>


<?php

  $query="SELECT * FROM `questions`";

  $questions=mysqli_query($link, $query);

  $numOfQuestions=mysqli_num_rows($questions);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Project: Quizzer | Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style Sheet -->

    <link href ="style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class ="container-fluid">

      <div class="row topRow">

        <h1> Quizzer </h1>

          <p class="lead">

            Looking for a place to test your skills? This is the right place for you. 

          </p>



        <div class= "col-md-6 col-md-offset-3 contentCol">

          <p class="lead"> This is a multiple choice quiz to test your knowledge. </p>
          <ul class="list-group">
            <li class="list-group-item"><strong>Number of Questions </strong>: <?php echo $numOfQuestions; ?></li>
            <li class="list-group-item"><strong>Type </strong>: MCQ </li>
            <li class="list-group-item"><strong>Estimated Time</strong>: <?php echo $numOfQuestions*0.5;  ?> Minute(s) </li>
          </ul>

          <a href="question.php?n=1"><button type="button" class="btn btn-lg btn-success">Start Quiz</button>
</a>

          



        </div>

      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>