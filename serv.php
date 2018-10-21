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
          $_SESSION['id_serv'] = $idPacient;
        }
        else
        {
          if(isset($_SESSION['id_serv']))
            $idPacient = $_SESSION['id_serv'];
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
	  $flag = !empty($namePat['dateOut']);
	  $namePat = $namePat['fio'];

	  if (empty($serv))
	  	{
			echo "<div align = 'center'><h1>Нет данных в Базе данных для пациента ".$namePat."</h1></div>";
			if($flag == 0)
				if($ldoc == $nameDoct)
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=3">Назначить процедуру</a>';
		}
	  else
	    {
			echo'<h1>Список назначений пациента '.$namePat.'</h1>
			<ol>'; 
			$sumall = 0;
						$listServ = explode(',', $serv);
						$countServ = count($listServ);
						$i = $allsum = $sumNow = 0;
						while ($i < $countServ) {
							$exListServ = explode('-', $listServ[$i]);
							$idServ = $exListServ[0];
							$idDoc = $exListServ[1];
							$statusServ = $exListServ[2];
							if ($statusServ == 1)
								$dataServ = $exListServ[3];
							else
								$dataServ = 'нет даты';
							$query = mysqli_query($connection, "SELECT * FROM items WHERE id= '".$idServ."'");
							$data = mysqli_fetch_assoc($query);
							$nameServ = $data['name'];
							$costServ = $data['cost'];
							$allsum += $costServ;

							if ($idDoc == 0)
								$nameDoc = 'Процедура не выполнена';
							else
							{
								$query = mysqli_query($connection, "SELECT fio FROM usertbl WHERE id= '".$idDoc."'");
								$data = mysqli_fetch_assoc($query);
								$nameDoc = $data['fio'];	
							}

							if($statusServ == 0)
								if(($_SESSION['typeUser'] == 'doc') or ($_SESSION['typeUser'] == 'ddoc') or ($_SESSION['typeUser'] == 'su'))
									$statServ = '<a  href="edit.php?flagedit=5&idPac='.$idPacient.'&idDoc='.$idDoctor.'&idArr='.$i.'">Выполнил</a>';
								else
									$statServ = 'Не выполнено';
							elseif($statusServ == 1)
							{	
								$sumNow += $costServ;
								$statServ = 'Выполнено';
							}
							if ($nameDoc == 'Процедура не выполнена')
								echo '<li>'.$nameServ.'		-	'.$nameDoc.'	-	'.$statServ.'</li>';
							else
								echo '<li style="background: hsl(122, 79%, 50%);">'.$nameServ.'		-	'.$nameDoc.'	-	'.$statServ.'	-	'.$dataServ.'</li>';
							$i++;	
						}
			echo '</ol>
			<hr>
			<p>Общая сумма услуг: '.$allsum.' (Выполнено: '.$sumNow.')</p>
			';
			$_SESSION['sum_serv'] = $allsum;
			if($flag == 0)
				if($ldoc == $nameDoct)
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=3">Назначить процедуру</a>';
		}	
	?>
</body>
</html>