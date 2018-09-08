<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h2>Список персонала</h2>
	<?php
		include("includes/DB.php");
		include ('includes/LogIO.php');
		include ('includes/Input.php');

		$input -> getPersonalTable($connection);
		
	?>
	
</body>
</html>