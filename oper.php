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
          $_SESSION['id_oper'] = $idPacient;
        }
        else
        {
          if(isset($_SESSION['id_oper']))
            $idPacient = $_SESSION['id_oper'];
        }

	  include("includes/DB.php");
	  require_once 'includes/Date.php';
	  require_once 'includes/LogIO.php';
	  $username = $access->getUserName();
	  $typeuser = $_SESSION['typeUser'];

	  $patQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPacient."'");
	  $namePat = mysqli_fetch_assoc($patQuery);
	  $typePat = $namePat['type'];
	  $status = $namePat['status'];
	  $namePat = $namePat['fio'];

	  $result = mysqli_query($connection, "SELECT * FROM operation WHERE client = '".$namePat."'");

	  if (mysqli_num_rows($result) == 0)
	  	{
			echo "<div align = 'center'><h1>Нет данных в Базе данных для пациента ".$namePat."</h1></div>";
			if($typeuser == 'admin')
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
				while($dataDB = mysqli_fetch_assoc($result))
					{
						echo '<li>'.$dataDB['sum'].'</li>';
						$sumall += $dataDB['sum'];
					}
			echo '</ol>
			<hr>
			<p>Общая сумма составляет: '.$sumall.'</p>
			';
			if ($typeuser == 'admin')
				if($status == 1)
					if ($typePat == 'Стационар')
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=1&id='.$idPacient.'">Провести операцию</a>';
					else
						echo '<a class="button" target="_blank" href="add.php?flagadd=6&stac=0&id='.$idPacient.'">Провести операцию</a>';
		}	
	?>
</body>
</html>