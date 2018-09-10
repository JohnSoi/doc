<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Вывод</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");
	include("includes/Input.php");

	$access->checkNotAuth();
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="input">
      <?php
      	if (isset($_GET['flaginput']))
      	{
      		$typePage = $_GET['flaginput'];
      		$_SESSION['flaginput'] = $typePage;
      	}
      	else
      	{
      		$typePage = $_SESSION['flaginput'];
      	}

      	switch ($typePage)
      	{
      		case 1:
      			echo '<section>';
			  				$input -> getPersonalTable($connection);
			  			echo '</section>';	
			  			echo '<section>';
			  				echo "<a class='button' href='add.php?flagadd=1'>Добавить пользователя</a>";
			  			echo '</section>';
      			break;
      		case 2:
      			echo "<h2>Вывод пациентов в амбулатории</h2>";
      			break;
      		case 3:
      			echo "<h2>Вывод пациентов в стационаре</h2>";
      			break;
      		case 4:
      			echo "<h2>Вывод услуг</h2>";
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