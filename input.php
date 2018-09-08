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
	$typePage = $_GET['flaginput'];

	if(isset($_SESSION['flagadd']))
		unset($_SESSION['flagadd']);
	if(isset($_SESSION['flagedit']))
		unset($_SESSION['flagedit']);
	if(isset($_SESSION['flagdel']))
		unset($_SESSION['flagdel']);

	include ('includes/LogIO.php');
	include("includes/DB.php");
	include ('includes/Input.php');

	$access->checkNotAuth();
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
 		<div class="content">
		  	<?php
		  		if ($typePage == 1)
		  		{
		  			echo '<section class="table">';
			  			echo '<section>';
			  				$input -> getPersonalTable($connection);
			  			echo '</section>';	
			  			echo '<section>';
			  				echo "<a class='button' href='add.php?flagadd=1'>Добавить пользователя</a>";
			  			echo '</section>';
		  			echo "</section>";
		  		} 
		  		else 
		  		{
		  			echo '<section class="main">
					      <h2>Что - то не так</h2>
					    </section>';
		  		}
		  	?>
 		</div>
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>