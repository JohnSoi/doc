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
	  $adPat = $namePat['ad'];
	  $agentPat = $namePat['agent'];
	  $dispPat = $namePat['dispecher'];
	  

	  	if(!empty($adPat))
	  		if($_SESSION['typeUser'] =='su')
				echo '<a href="input.php?flaginput=13&id='.$idPacient.'" class="button" target="_blank">'.$adPat.'</a>';
			else
				echo '<p href="" class="button">'.$adPat.'</p>';
		else
			if($_SESSION['typeUser'] =='doc' || $_SESSION['typeUser'] =='ddoc' || $_SESSION['typeUser'] =='su')
				echo '<a href="input.php?flaginput=13&id='.$idPacient.'" class="button" target="_blank">Реклама</a>';
			else
				echo '<p href="" class="button">Реклама</p>';
			
		if(!empty($agentPat))
			if($_SESSION['typeUser'] =='su')
				echo '<a href="input.php?flaginput=14&id='.$idPacient.'" class="button" target="_blank">'.$agentPat.'</a>';
			else
				echo '<p href="" class="button">'.$agentPat.'</p>';
		else
			if($_SESSION['typeUser'] =='doc' || $_SESSION['typeUser'] =='ddoc' || $_SESSION['typeUser'] =='su')
				echo '<a href="input.php?flaginput=14&id='.$idPacient.'" class="button" target="_blank">Агенты</a>';
			else
				echo '<p href="" class="button">Агенты</p>';
		if(!empty($dispPat))
			if($_SESSION['typeUser'] =='su')
				echo '<a href="input.php?flaginput=15&id='.$idPacient.'" class="button" target="_blank">'.$dispPat.'</a>';
			else
				echo '<p href="" class="button">'.$dispPat.'</p>';
		else
			if($_SESSION['typeUser'] =='doc' || $_SESSION['typeUser'] =='ddoc' || $_SESSION['typeUser'] =='su')
				echo '<a href="input.php?flaginput=15&id='.$idPacient.'" class="button" target="_blank">Диспетчеры</a>';
			else
				echo '<p href="" class="button">Диспетчеры</p>';
	
	?>
</body>	
</html>