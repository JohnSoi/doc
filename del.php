<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");

	include("includes/DB.php");

	//Проверка на авторизацию
 	if(isset($_GET['id']))
		{
		//Удаление пользователя
		if($_GET['flagdel'] == 1)
			{
	    		$id = $_GET['id'];
	    		$query ="DELETE FROM usertbl WHERE id = '$id'";
	    		$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
				echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=1\";}, 100);</script>";
			}
		//Удаление услуги
		elseif($_GET['flagdel'] == 2)
			{
	    		$id = $_GET['id'];
	    		$query ="DELETE FROM items WHERE id = '$id'";
	    		$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
				echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=4\";}, 100);</script>";
			}
		}
?>