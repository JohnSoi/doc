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
	  // Получение парметров из запроса 
	  if (isset($_GET['id'])){
          $idPacient = $_GET['id'];
          $_SESSION['id_serv'] = $idPacient;
        }
      else{
          if(isset($_SESSION['id_serv']))
            $idPacient = $_SESSION['id_serv'];
        }
      // Подключение сторонних файлов и параметров
	  include("includes/DB.php");
	  require_once 'includes/Date.php';
	  require_once 'includes/LogIO.php';
	  $username = $access->getUserName();
	  $typeuser = $_SESSION['typeUser'];

	  // Запросы и параметры в переменные
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

	  // При отсутствие выдать сообщение
	  if (empty($serv)){
			echo "<div align = 'center'><h1>Нет данных в Базе данных для пациента ".$namePat."</h1></div>";
			if($flag == 0)
				if(($typeuser == 'doc') or ($typeuser == 'ddoc') or ($typeuser == 'su'))
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=3">Назначить процедуру</a>';
			}
	  // Вывод назначений 
	  else{
			echo '<table align="center">'; 
				$sumall = 0;
				$listServ = explode(',', $serv);
				$countServ = count($listServ);
				$i = $allsum = $sumNow = 0;

				echo '<tr>';
					echo "<td>Дата назначения</td>";
					echo "<td>Процедура</td>";
					echo "<td>Стоимость</td>";
					echo "<td>Назначил</td>";
					echo "<td>Выполнил</td>";
					echo "<td>Статус</td>";
					echo "<td>Время выполнения</td>";
				echo '</tr>';

				while ($i < $countServ){
					$exListServ = explode('-', $listServ[$i]);
					$idServ = $exListServ[0];
					$idNaDoc = $exListServ[1];
					$idDoc = $exListServ[2];
					$dataN = $exListServ[5];
					if(isset($exListServ[6]))
						$servCost = $exListServ[6];
					else
						unset($servCost);
					$statusServ = $exListServ[3];
					if ($statusServ == 1)
						$dataServ = $exListServ[4];
					else
						$dataServ = 'нет даты';
					$query = mysqli_query($connection, "SELECT * FROM items WHERE id= '".$idServ."'");
					$data = mysqli_fetch_assoc($query);
					$nameServ = $data['name'];
					$costServ = $data['cost'];
					if($costServ>1)
						$allsum += $costServ;
					if(isset($servCost))
						$allsum += $servCost;
					if ($idDoc == 0)
						$nameDoc = 'Не выполнена';
					else{
						$query = mysqli_query($connection, "SELECT fio FROM usertbl WHERE id= '".$idDoc."'");
						$data = mysqli_fetch_assoc($query);
						$nameDoc = $data['fio'];	
						}
					
					$query1 = mysqli_query($connection, "SELECT fio FROM usertbl WHERE id= '".$idNaDoc."'");
					$data1 = mysqli_fetch_assoc($query1);
					$nameNDoc = $data1['fio'];

					echo '<tr>';
						if($statusServ == 0)
							if(($_SESSION['typeUser'] == 'doc') or ($_SESSION['typeUser'] == 'ddoc') or ($_SESSION['typeUser'] == 'su') or ($_SESSION['typeUser'] == 'psi')  or ($_SESSION['typeUser'] == 'stpsi'))
								$statServ = '<a class="rollover"  href="edit.php?flagedit=5&idPac='.$idPacient.'&idDoc='.$idDoctor.'&idArr='.$i.'">Выполнил</a>';
							else
								$statServ = 'Не выполнено';
						elseif($statusServ == 1){
							if($costServ>1)
								$sumNow += $costServ;
							if(isset($servCost))
								$sumNow += $servCost;
							$statServ = 'Выполнено';
							}
						if ($nameDoc == 'Не выполнена'){
							echo '<td>'.$dataN.'<br><a href="edit.php?flagedit=11&id='.$idPacient.'&date='.$dataN.'&idServ='.$idServ.'">Отменить</a></td>';
							echo '<td>'.$nameServ.'</td>';
							if(isset($servCost))
								echo '<td>'.$servCost.'</td>';
							else
								echo '<td>'.$costServ.'</td>';
							echo '<td>'.$nameNDoc.'</td>
							<td>'.$nameDoc.'</td>
							<td>'.$statServ.'</td>
							<td>'.$dataServ.'</td>';
							}
						else{
							if($typeuser == 'su')
								echo '<td style="background: hsl(122, 79%, 50%);">'.$dataN.'<br><a href="edit.php?flagedit=11&id='.$idPacient.'&date='.$dataN.'&idServ='.$idServ.'">Отменить</a></td>
								<td style="background: hsl(122, 79%, 50%);">'.$nameServ.'</td>';
							else
								echo '<td style="background: hsl(122, 79%, 50%);">'.$dataN.'</td>
								<td style="background: hsl(122, 79%, 50%);">'.$nameServ.'</td>';
							if(isset($servCost))
								echo '<td style="background: hsl(122, 79%, 50%);">'.$servCost.'</td>';
							else
								echo '<td style="background: hsl(122, 79%, 50%);">'.$costServ.'</td>';
							echo '<td style="background: hsl(122, 79%, 50%);">'.$nameNDoc.'</td>
							<td style="background: hsl(122, 79%, 50%);">'.$nameDoc;
							if(($nameDoc == $nameDoct) || ($typeuser == 'su'))
								echo '<br><a href="edit.php?flagedit=9&id='.$idPacient.'&dataServ='.$dataServ.'&idServ='.$idServ.'">Отменить</a>';
							echo'</td><td style="background: hsl(122, 79%, 50%);">'.$statServ.'</td>
							<td style="background: hsl(122, 79%, 50%);">'.$dataServ.'</td>';
							}
						$i++;	
						}
					echo '</tr>';
					echo '<tr>';
						echo "<td rowspan='2' style=\"background: hsl(59, 76%, 50%);\">Общая сумма услуг</td>";
						echo "<td style=\"background: hsl(59, 76%, 50%);\">".$allsum."</td>";
						echo '<td style="background: hsl(59, 76%, 50%);">Выполнено на</td>';
						echo '<td style="background: hsl(59, 76%, 50%);">'.$sumNow.'</td>';
						$_SESSION['cost_serv'] = $sumNow;
					echo '</tr>';
			echo '</table>';

			$_SESSION['sum_serv'] = $allsum;
			if($flag == 0)
				if(($typeuser == 'doc') or ($typeuser == 'ddoc') or ($typeuser == 'su'))
					echo '<a target="_blank" class = "button" href="add.php?id='.$idPacient.'&flagadd=3">Назначить процедуру</a>';
		}	
	?>
</body>
</html>