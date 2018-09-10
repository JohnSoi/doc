<?php
	session_start();
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

		$access -> checkNotAuth();
		$username = $access -> getUserName();
	?>
	<div class="containermlogin">
		<h1><?php $wel = new Welcome($username);?></h1>
	</div>
	<?php
		echo "<script>setTimeout(function(){self.location=\"main.php\";}, 1500);</script>";
	?>
	
</body>
</html>