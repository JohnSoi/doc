<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Параметры</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include("includes/DB.php");
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="param">
      <?php
      			echo "<h2>Вывод параметров</h2>";
      ?>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>