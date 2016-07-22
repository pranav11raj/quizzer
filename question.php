<?php
  session_start();
  include("database.php");

?>

<?php

  $number= (int) $_GET['n'];

  $query= "SELECT * FROM `questions` WHERE question_number=$number LIMIT 1";

  $results=mysqli_query($link, $query);

  if($results)
  {
    $result=mysqli_fetch_assoc($results);
    //print_r($result);
  }
  else
  {
    echo "Could not execute the query";
  }

  $query2= "SELECT * FROM `choices` WHERE question_number=$number LIMIT 4";

  $results2=mysqli_query($link, $query2);

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
    <title>Project: Quizzer | Questions</title>

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

          


        <div class= "col-md-6 col-md-offset-3 contentCol">

          <p class="lead"> Question <?php echo $number; ?> of <?php echo $numOfQuestions; ?>: </p>
          
            <form method="post" action="process.php">
                <div class ="questionArea">

                  <p><?php echo $result['text']; ?></p>



                  <ul class="list-group">

                    <?php

                      while ($row = mysqli_fetch_assoc($results2))
                      {
                    ?>

                      <li class="list-group-item"><div class="radio"><label><input type="radio" name="choice" value=" <?php echo $row['id']; ?>"><?php echo $row['text']; ?></label></div></li>




                    <?php } ?>



                    

                    

                   
                  </ul>

                </div>
                <p> Click the <kbd>Submit</kbd> button or press the <kbd>Enter/Return</kbd> button to submit your answer.</p>
                <input type="submit" value="Submit" name="submit" class="btn btn-success btn-lg">
                <input type="hidden" name="number" value="<?php echo $number;  ?>">
                

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