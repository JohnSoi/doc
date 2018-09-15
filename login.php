<?php
	session_start();
	if(isset($_SESSION["session_username"]))
		header("Location:main.php");
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
	<?php
		include("includes/DB.php");
		include("includes/LogIO.php");

		if(isset($_POST["login"]))
		{
	    		$username=$_POST['username'];
	    		$password=$_POST['password'];

	    		$access -> Authorization($username, $password, $connection);
		}
	?>
	<div class="container mregister">
		<div id="login">
	    	<h1>Вход</h1>
			<form name="loginform" id="loginform" action="" method="POST">
	    		<p>
	        		<label for="user_login">Логин<br />
	        		<input type="text" name="username" id="username" class="input" value="" autocomplete="off" required/></label>
	    		</p>
	    		<p>
	        		<label for="user_pass">Пароль<br />
	        		<input type="password" name="password" id="password" class="input" value="" autocomplete="off" required/></label>
	   			</p>
	        	<p class="submit">
	        		<input type="submit" name="login" class="button" value="Войти" />
	    		</p>
			</form>
	    </div>
	</div>
	<?php
		if (!empty($_SESSION['GOODMES']))
			echo "<div class='good'>".$_SESSION['GOODMES']."</div>";
		if (!empty($_SESSION['BADMES']))
			echo "<div class='error'>".$_SESSION['BADMES']."</div>";
		
	?>
</body>
</html>