<?php 
	session_start();
  	if(!$_SESSION['session_username'])
   		header("Location:login.php");

   	require_once('includes/DB.php'); 

	$id = $_GET['id'];
	$typePage = $_GET['flagedit'];
		
	switch($typePage)
	{
		case 4:
			$doctor = mysqli_query($connection, "SELECT fio FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
			$data = mysqli_fetch_assoc($doctor);
			$query = mysqli_query($connection, "UPDATE patient SET doctor = '".$data['fio']."' WHERE id = '".$id."'");
			echo "<script>setTimeout(function(){history.back();}, 50);</script>";
			break;
	}
 ?>