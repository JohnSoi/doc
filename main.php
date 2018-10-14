<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
?>
<?php
	if ($typeuser == 'view')
		header("Location: stat.php");
	else
		header("Location: input.php?flaginput=2");
?>
