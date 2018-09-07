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
	$typePage = $_GET['flag'];
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
  	<?php
  		if ($typePage == 1)
  		{
  			echo '<section class="input">
			      <div id="router">
				  <router-link to="/list">Персонал</router-link>
				  <router-link to="/add">Добавить</router-link>
				  </div>
				  <div id="view">
				  <router-view></router-view>
				  </div>
			    </section>';
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/route.js"></script>
<script src="js/script.js"></script>
</body>
</html>