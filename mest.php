<?php
	/* --- Провекра на авторизованность --- */
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Места</title>
	<link rel="stylesheet" href="css/mini.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>
	<?php
	  /* --- Получение параметров --- */
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
      /* --- Подключение сторонних файлов --- */
	  include("includes/DB.php");
	  require_once 'includes/Date.php';

	  /* ---  Запрос к таблице пациентов и пользователей и получение необходимых парметров --- */
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

	  /* --- Проверка наличия данных --- */
	  if (empty($dist)){
			echo "<div align = 'center'><h1>Нет данных в Базе данных для пациента ".$namePat."</h1></div>";
			if($flag == 0)
				if($ldoc == $nameDoct)
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=2">Добавить койко - место</a>';
			}
	  else{
			echo'<h1>Койко место для пациента '.$namePat.'</h1>';
			/* --- Разделение на состовляющие --- */
			$allsum = $allday = 0;
			$listMest = explode(',', $dist);
			$countDay = count($listMest);
			$i = 0;
			echo "<table align='center' style='width: 90%;'>";
			/* --- Цикл вывода данных --- */
				while ($i<$countDay){
						$expMest= explode('-', $listMest[$i]);
						$id = $expMest[0];
						$countD = $expMest[1];
						$mestQuery =mysqli_query($connection, "SELECT * FROM mest WHERE id = '".$id."'");
						$mestArr = mysqli_fetch_assoc($mestQuery);
						$costMest = $mestArr['value'];
						$nameMest = $mestArr['status'];
						echo '<tr>';
							echo '<td>'.$nameMest.' ('.$costMest.')</td>';
							echo '<td>'.$countD.'</td>';
							echo '<td>'.$costMest*$countD.'</td>';
						echo '</tr>';
						$allsum += $costMest*$countD;
						$allday += $countD;
						$i++;
						}
					echo '<tr style="background: hsl(100, 73%, 44%);">';
						echo '<td style="background: green; color: white; font-size: 20px;">Итого</td>';
						echo '<td style="background: green; color: white; font-size: 20px;">'.$allday.'</td>';
						echo '<td style="background: green; color: white; font-size: 20px;">'.$allsum.'</td>';
					echo '</tr>';
				echo '</table>';
			$_SESSION['sum_mest']=$allsum;
			/* --- Вывод кнопки --- */
			if($flag == 0)
				if($ldoc == $nameDoct)
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=2">Добавить койко - место</a>';
			}	
	?>
</body>
</html>