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
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
			<?php
				echo $dateIn = $date->normalizeDate($date->getDate());
			?>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>