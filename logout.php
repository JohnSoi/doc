<?php
	session_start();
	include ('includes/LogIO.php');

	$access->checkNotAuth();
	$access->dest_ses();
?>