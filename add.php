<?php

  

  include("database.php");

  $queryMax="SELECT MAX(question_number) FROM questions";

  $maxQuesRow=mysqli_query($link, $queryMax);

  $maxQuesArray=mysqli_fetch_array($maxQuesRow);

  $maxQuesNum = $maxQuesArray[0]+1;


  

  

  if(isset($_POST['submit']) and $_POST['submit']=="Save")

  {


    //$value = isset($_POST['value']) ? $_POST['value'] : '';
    $question_number=isset($_POST['question_number']) ? $_POST['question_number']: 0;
    $question_text=isset($_POST['question_text']) ? $_POST['question_text']: '';
    $choices[1]=isset($_POST['choice1']) ? $_POST['choice1']: '';
    $choices[2]=isset($_POST['choice2']) ? $_POST['choice2']: '';
    $choices[3]=isset($_POST['choice3']) ? $_POST['choice3']: '';
    $choices[4]=isset($_POST['choice4']) ? $_POST['choice4']: '';
    $correct_choice=isset($_POST['correct_choice']) ? $_POST['correct_choice']: '';


    $query="INSERT INTO questions (question_number, text) VALUES ('$question_number','$question_text')";

    mysqli_query($link, $query);

    foreach($choices as $choice) 
    {
      if($choice==$correct_choice)
      {
        $is_correct=1;
      }
      else
      {
        $is_correct=0;
      }
      $query="INSERT INTO choices (question_number, is_correct, text) VALUES ('$question_number','$is_correct','$choice')";

      mysqli_query($link, $query);

      
    }
    $_SESSION['msg']="Question has been added.";
    unset($_POST['submit']);
    
  }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Project: Quizzer | Add Question</title>

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
        <p class="lead">  Add your questions here. </p>

        
          <?php if(isset($_SESSION['msg'])){echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>
';} ?>
        
          


        <div class= "col-md-6 col-md-offset-3 contentCol">

        <form method="post" action="add.php">

          <div class="questionArea">

            <div class="form-group">
              <label for="question_number">Question Number</label>
              <input type="number" class="form-control" placeholder="Question Number" name="question_number" value="<?php echo $maxQuesNum; ?>" required>
            </div>

            <div class="form-group">
              <label for="question_text">Question Text:</label>
              <input type="text" class="form-control" placeholder="Question Text" name="question_text" required>
            </div>

            <div class="form-group">
              <label for="choice1">Choice #1:</label>
              <input type="text" class="form-control" placeholder="Choice 1" name="choice1" required>
            </div>

            <div class="form-group">
              <label for="choice2">Choice #2:</label>
              <input type="text" class="form-control" placeholder="Choice 2" name="choice2" required>
            </div>

            <div class="form-group">
              <label for="choice3">Choice #3:</label>
              <input type="text" class="form-control" placeholder="Choice 3" name="choice3" required>
            </div>

            <div class="form-group">
              <label for="choice4">Choice #4:</label>
              <input type="text" class="form-control" placeholder="Choice 4" name="choice4" required>
            </div>

            <div class="form-group">
              <label for="correct_choice">Correct Choice:</label>
              <input type="text" class="form-control" placeholder="Correct Choice" name="correct_choice" required>
            </div>

          </div>

          <input type="submit" name="submit" value="Save" class="btn btn-primary">

        </form>
          
        </div>

      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>