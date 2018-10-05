<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Статистика</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="input">
      <?php
      	if (isset($_GET['flagstat']))
      	{
      		$typePage = $_GET['flagstat'];
      		$_SESSION['flagstat'] = $typePage;
      	}
      	else
      	{
      		$typePage = $_SESSION['flagstat'];
      	}

      	switch ($typePage)
      	{
      		case 1:
      			echo "<h2>Вывод статистики амбулатории</h2>";
      			break;
      		case 2:
      			echo "<h2>Вывод статистики стационара</h2>";
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
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>