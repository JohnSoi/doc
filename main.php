<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
?>
<?php
	require_once 'includes/LogIO.php';
	$username = $access->getUserName();
	$typeuser = $_SESSION['typeUser'];

	if ($typeuser == 'view')
		header("Location: stat.php");
	elseif(($typeuser == 'doc') or ($typeuser == 'ddoc'))
		header("Location: add.php?flagadd=5&stac=1");
	elseif($typeuser == 'admin')
		header("Location: add.php?flagadd=6&stac=1");
	else
		header("Location:param.php");
?>
