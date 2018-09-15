<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
	
	include ('includes/LogIO.php');
	include("includes/DB.php");
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
    <div class="cont-client">
    	<div class="block1"><a href="input.php?flaginput=2">Прием пациента</a></div>
    	<div class="block2"><a href="input.php?flaginput=6">Денежные операции</a></div>
    	<div class="block3"><h1>Статистика за сегодня</h1></div>
    </div>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>