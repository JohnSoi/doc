<?php
	/* --- Проверка на авторизованность --- */
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Приветствие</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
			/* --- Установка временной зоны --- */
			date_default_timezone_set('Asia/Yekaterinburg');
			/* --- Подключение сторонних файлов --- */
			include("includes/LogIO.php");
			include("includes/welcome.php");
			/* --- Получение имени пользователя --- */
			$username = $access -> getUserName();
		?>
		<!-- Вывод приветствия -->
		<div class="cont-center">
			<h1><?php $wel = new Welcome($username);?></h1>
		</div>
		<!-- Переход -->
		<?php
			echo "<script>setTimeout(function(){self.location=\"main.php\";}, 1500);</script>";
		?>
		
	</body>
</html>