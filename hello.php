<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include("includes/LogIO.php");
		include("includes/welcome.php");

		$username = $access -> getUserName();
	?>
	<div class="cont-center">
		<h1><?php $wel = new Welcome($username);?></h1>
	</div>
	<?php
		echo "<script>setTimeout(function(){self.location=\"main.php\";}, 1500);</script>";
	?>
	
</body>
</html>