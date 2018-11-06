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
          $idPacient = $_GET['id'];
          $_SESSION['id_oper'] = $idPacient;
        }
        else
        {
          if(isset($_SESSION['id_oper']))
            $idPacient = $_SESSION['id_oper'];
        }
      // Подключение сторонних файлов
	  include("includes/DB.php");
	  require_once 'includes/Date.php';
	  require_once 'includes/LogIO.php';
	  // Получение дополнительных сведений
	  $username = $access->getUserName();
	  $typeuser = $_SESSION['typeUser'];

	  // Запрос к БД и получение сведений
	  $patQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPacient."'");
	  $namePat = mysqli_fetch_assoc($patQuery);
	  $typePat = $namePat['type'];
	  $status = $namePat['status'];
	  $namePat = $namePat['fio'];

	  // Получение операций
	  $result = mysqli_query($connection, "SELECT * FROM operation WHERE client = '".$namePat."'");

	  // Проверка наличия записей
	  if (mysqli_num_rows($result) == 0)
	  	{
			echo "<div align = 'center'><h1>Нет данных в Базе данных для пациента ".$namePat."</h1></div>";
			if(($typeuser == 'admin') or ($typeuser == 'su'))
				if($status == 1)
					if ($typePat == 'Стационар')
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=1&id='.$idPacient.'">Провести операцию</a>';
					else
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=0&id='.$idPacient.'">Провести операцию</a>';
		}
	  else
	    {
			echo'<h1>Список денежных операций пациента '.$namePat.'</h1>
			<ol>';
			$sumall = 0;
			// Подсчет суммы и вывод операций
				while($dataDB = mysqli_fetch_assoc($result))
					{
						echo '<li>'.$dataDB['sum'].'</li>';
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
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=1&id='.$idPacient.'">Провести операцию</a>';
					else
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=0&id='.$idPacient.'">Провести операцию</a>';
		}	
	?>
</body>
</html>