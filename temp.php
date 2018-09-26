<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
	
	include ('includes/LogIO.php');
	include("includes/DB.php");
	include("includes/Date.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Тестовый сайт</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>
	<div class="wrapper">
  <div class="content">
			<?php
				echo $date->getPeriod('23/09/2018');
				echo '<br>';
				echo $date->getPeriod('21/07/2018');
				echo '<br>';
				echo $date->getPeriod('23/10/2018');
				echo '<br>';

			?>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>