<?php

	include("database.php");

?>

<?php

	session_start();

	


	if(!isset($_SESSION['score']))
	{
		$_SESSION['score']=0;
	}


	if($_POST['submit']=="Submit")
	{
		$number=$_POST['number'];
		$selectedChoice=$_POST['choice'];
		$nextNumber=$number+1;

		$query="SELECT * FROM choices WHERE question_number=$number AND is_correct=1";

		$results=mysqli_query($link, $query);

		$resultRow= mysqli_fetch_assoc($results);

		$correctChoice=$resultRow['id'];


		$query="SELECT * FROM `questions`";

		$questions=mysqli_query($link, $query);

		$numOfQuestions=mysqli_num_rows($questions);

		$totalCorrect=0;


		if($selectedChoice==$correctChoice)
		{
			$_SESSION['score']=$_SESSION['score']+1;
			
		}

		if($number==$numOfQuestions)
		{
			header("Location:final.php");
		}
		else
		{
			header("location: question.php?n=".$nextNumber);
		}
	}

?>