<?php
// Проверка на неавторизованность
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
	// Полученик пармеиров из запроса
	  if (isset($_GET['id']))
        {
          $idPatient = $_GET['id'];
          $_SESSION['id_oper'] = $idPatient;
        }
        else
        {
          if(isset($_SESSION['id_oper']))
            $idPatient = $_SESSION['id_oper'];
        }
      // Подключение сторонних файлов
	  include("includes/DB.php");
	  require_once 'includes/Date.php';
	  require_once 'includes/LogIO.php';
	  // Получение дополнительных сведений
	  $username = $access->getUserName();
	  $typeuser = $_SESSION['typeUser'];

	  // Запрос к БД и получение сведений
	  $patQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPatient."'");
	  $namePat = mysqli_fetch_assoc($patQuery);
	  $typePat = $namePat['type'];
	  $status = $namePat['status'];
	  $namePat = $namePat['fio'];

	  // Получение операций
	  $result = mysqli_query($connection, "SELECT * FROM operation WHERE client = '".$namePat."'");

	  //Проверка депозита
	  $searchDeposit = mysqli_query($connection, "SELECT * FROM deposit WHERE fio = '".$namePat."'");
	  if(mysqli_num_rows($searchDeposit) != 0)
	  {
	  	$deposArr = mysqli_fetch_assoc($searchDeposit);
	  	$sumDeposit = $deposArr['sum'];
	  }

	  // Проверка наличия записей
	  if (mysqli_num_rows($result) == 0)
	  	{
			echo "<div align = 'center'><h1>Нет данных в Базе данных для пациента ".$namePat."</h1></div>";
			if(($typeuser == 'admin') or ($typeuser == 'su'))
				if($status == 1)
					if ($typePat == 'Стационар')
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=1&id='.$idPatient.'">Провести операцию</a>';
					else
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=0&id='.$idPatient.'">Провести операцию</a>';
		}
	  else
	    {
			echo'<h1>Список денежных операций пациента '.$namePat.'</h1>';
			if(!empty($sumDeposit))
				echo '<h1>Средств в депозите: '.$sumDeposit.' <a href="edit.php?flagedit=12&id='.$idPatient.'">Вывести</a></h1>';
			echo '
			<ol>';
			$sumall = 0;
			// Подсчет суммы и вывод операций
				while($dataDB = mysqli_fetch_assoc($result))
					{
						if ($dataDB['typeSum'] == 'nal')
							$type = 'Наличный расчет';
						elseif($dataDB['typeSum'] == 'dep')
							$type = 'Депозит';
						else
							$type = 'Безналичный расчет';
						echo '<li>'.$dataDB['sum'].' / '.$type.'</li>';
						$sumall += $dataDB['sum'];
					}
			echo '</ol>
			<hr>
			<p>Общая сумма составляет: '.$sumall.'</p>
			';
			// Вывод кнопки Операций
			if(($typeuser == 'admin') or ($typeuser == 'su'))
				if($status == 1)
					if ($typePat == 'Стационар')
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=1&id='.$idPatient.'">Провести операцию</a>';
					else
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=0&id='.$idPatient.'">Провести операцию</a>';
			if(!isset($_SESSION['cost_mest']))
				$_SESSION['cost_mest'] = 0;
			if(!isset($_SESSION['cost_serv']))
				$_SESSION['cost_serv'] = 0;
			$transferSum = $sumall - $_SESSION['cost_serv'] - $_SESSION['cost_mest'];
			if($sumall > ($_SESSION['cost_serv']+$_SESSION['cost_mest']))
				echo '<a class="button" target="_blank" href="add.php?flagadd=12&id='.$idPatient.'&sum='.$transferSum.'">Перевсти '.$transferSum.'р. в депозит</a>';
		}	
	?>
</body>
</html>