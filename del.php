<?php
	/* --- Проверка на авторизованность --- */
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");

	/* --- Подключение сторонних файлов --- */
	include("includes/DB.php");

	//Проверка на параметр
 	if(isset($_GET['id'])){
		//Удаление пользователя
		if($_GET['flagdel'] == 1){
	    	$id = $_GET['id'];
	    	$query ="DELETE FROM usertbl WHERE id = '$id'";
	    	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
			echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=1\";}, 100);</script>";
			}
		//Удаление услуги
		elseif($_GET['flagdel'] == 2){
	    	$id = $_GET['id'];
	    	$query ="DELETE FROM items WHERE id = '$id'";
	    	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
			echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=4\";}, 100);</script>";
			}
		//Удаление койко - места
		elseif($_GET['flagdel'] == 3){
	    	$id = $_GET['id'];
	    	$query ="DELETE FROM mest WHERE id = '$id'";
	    	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
			echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=6\";}, 0);</script>";
			}
		elseif($_GET['flagdel'] == 4){
			$idPatient = $_GET['id'];
			$idServ = $_GET['idServ'];
			$listMestIn = '';

			$patQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = ".$idPatient);
			$patArr = mysqli_fetch_assoc($patQuery);
			$listMest = $patArr['mest'];
			$listMest = explode(',', $listMest);
			$countList = count($listMest);
			for ($i=0; $i < $countList; $i++) {
				echo $listMestIn[$i];
				if($countList == 1)
					$listMestIn = 0;
				else
					if($i == $idServ)
						{}
					else{
						if($i == 0)
							$listMestIn .= $listMest[$i];
						elseif($i == 1 && $idServ == 0)
							$listMestIn .= $listMest[$i];
						else
							$listMestIn .= ','.$listMest[$i];
						}
				}
			$updatePatient = mysqli_query($connection, "UPDATE patient SET mest = '".$listMestIn."' WHERE id = ".$idPatient);
			if($updatePatient)
				header("Location:mest.php?id=".$idPatient);
			}
		}
		if($_GET['flagdel'] == 5){
	    	$id = $_GET['id'];
	    	$query ="DELETE FROM patient WHERE id = '$id'";
	    	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
			echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=1\";}, 100);</script>";
			}
		if($_GET['flagdel'] == 6){
	    	$id = $_GET['id'];
	    	$query ="UPDATE patient SET doctor = '' WHERE id = '$id'";
	    	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
			echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=3&id=".$id."\";}, 100);</script>";
			}
		if($_GET['flagdel'] == 7){
	    	$id = $_GET['id'];
			$idP = $_GET['idP'];
	    	$query ="DELETE FROM operation WHERE id = '$id'";
	    	$result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
			echo "<script>setTimeout(function(){self.location=\"oper.php?flaginput=3&id=".$idP."\";}, 10);</script>";
			}
?>