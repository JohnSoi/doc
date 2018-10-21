<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вывод</title>
	<link rel="stylesheet" href="css/mini.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>
	<?php
	  if (isset($_GET['id']))
        {
          $idPacient = $_GET['id'];
          $_SESSION['id_mest'] = $idPacient;
        }
        else
        {
          if(isset($_SESSION['id_mest']))
            $idPacient = $_SESSION['id_mest'];
        }

	  include("includes/DB.php");
	  require_once 'includes/Date.php';

	  $patQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPacient."'");
	  $namePat = mysqli_fetch_assoc($patQuery);
	  $doctor = mysqli_query($connection, "SELECT * FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
	  $dataDOC = mysqli_fetch_assoc($doctor);
	  $idDoctor = $dataDOC['id'];
	  $nameDoct = $dataDOC['fio'];
	  $typePat = $namePat['type'];
	  $serv = $namePat['sp_uslug'];
	  $ldoc = $namePat['doctor'];
	  $dist = $namePat['mest'];
	  $flag = !empty($namePat['dateOut']);
	  $namePat = $namePat['fio'];


	  if (empty($dist))
	  	{
			echo "<div align = 'center'><h1>Нет данных в Базе данных для пациента ".$namePat."</h1></div>";
			if($flag == 0)
				if($ldoc == $nameDoct)
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=2">Добавить койко - место</a>';
		}
	  else
	    {
			echo'<h1>Койко место для пациента '.$namePat.'</h1>
			<ol>';
				$allsum = 0;
				$listMest = explode(',', $dist);
				$countDay = count($listMest);
				$i = 0;
				while ($i<$countDay){
					$id = $listMest[$i];
					$mestQuery =mysqli_query($connection, "SELECT * FROM mest WHERE id = '".$id."'");
					$mestArr = mysqli_fetch_assoc($mestQuery);
					$costMest = $mestArr['value'];
					echo '<li>пациент занимает койко место №'.$mestArr['id'].' ('.$mestArr['value'].')</li>';
					$allsum += $costMest;
					$i++;
				}
			echo '</ol>
			<hr>
			<p>Общая сумма составляет: '.$allsum.'</p>
			';
			$_SESSION['sum_mest']=$allsum;
			if($flag == 0)
				if($ldoc == $nameDoct)
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=2">Добавить койко - место</a>';
		
		}	
	?>
</body>
</html>