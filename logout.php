<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
	
	include ('includes/LogIO.php');

	$access->dest_ses();
?>