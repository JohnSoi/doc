<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Добавление</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");

	$access->checkNotAuth();
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="add">
      <?php
      	if (isset($_GET['flagadd']))
      	{
      		$typePage = $_GET['flagadd'];
      		$_SESSION['flagadd'] = $typePage;
      	}
      	else
      	{
      		$typePage = $_SESSION['flagadd'];
      	}

      	switch ($typePage)
      	{
      		case 1:
      			echo "<h2>Добавление пользователя</h2>";
      			break;
      		case 2:
      			echo "<h2>Добавление в амбулаторию</h2>";
      			break;
      		case 3:
      			echo "<h2>Добавление в стационар</h2>";
      			break;
      		case 4:
      			echo "<h2>Добавление услуги</h2>";
      			break;
      		default:
      			echo "<h2>Перенаправление на странцу авторизации</h2>";
      			echo "<script>setTimeout(function(){self.location=\"login.php\";}, 1500);</script>";
      			break;

      	}
      ?>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>