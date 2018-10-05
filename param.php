<?php
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");

	include("includes/DB.php");
	include('includes/DBOper.php');

	if(isset($_GET['submit']))
        {
            $value = $_GET['input'];
              
            $changeParam = mysqli_query($connection, "UPDATE param SET value = '".$value."' WHERE name = 'Прием'");

            if ($changeParam)
                $message = "Параметры сохранены";
            else
              $message = "Ошибка сохранения";
        }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Параметры</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
			if (!empty($message)) 
	    		echo "<p class=\"error\">" . "Сообщение: ". $message . "</p>";	
		?>
  <div class="content">
    <section class="param">
    	<?php 
    		$param = array();
    		$query = mysqli_query($connection, "SELECT * FROM param");
    		if (mysqli_num_rows($query) == 0)
    			$cost = 0;
    		else
    		while ($data = mysqli_fetch_assoc($query)) 
    		{
    			$param[$data['name']] = $data['value'];
    		}
    		$cost = $param['Прием'];
    		$lastCH = $param['Последнее изменение'];
    		$lastBU = $param['Последняя копия'];
    		$count = $DBO -> countFile(); 
    		$query = mysqli_query($connection, "SELECT * FROM patient");
    		$queryOpen = mysqli_query($connection, "SELECT * FROM patient WHERE status = '1'");
    		$queryClose = mysqli_query($connection, "SELECT * FROM patient WHERE status = '0'");
    		$countPacient = mysqli_num_rows($query);
    		$countPacientOpen = mysqli_num_rows($queryOpen);
    		$countPacientClose = mysqli_num_rows($queryClose);
            $queryA = mysqli_query($connection, "SELECT * FROM operation WHERE type = 'Амбулатория'");
            $queryS = mysqli_query($connection, "SELECT *  FROM operation WHERE type = 'Стационар'");
            $sumA = $sumS = 0;
            while ($row = mysqli_fetch_assoc($queryA)){
                $sumA += $row['sum'];
            }
            while ($row = mysqli_fetch_assoc($queryS)){
                $sumS += $row['sum'];
            }
    	?>
    	<form action="param.php" method="GET">
    		<p><label for="input">Стоимость приема пациента:<br><input name="input" type="text" value=<?php echo $cost; ?>></label></p>
    		<p> Дата последнего изменения: <?php  echo $lastCH?></p>
    		<p> Дата последнего backup`а: <?php  echo $lastBU?></p>
    		<p> Количество файлов backup`а: <?php  echo $count?></p>
    		<p> Записей о пациентах: <?php  echo $countPacient?> из них <span style = "color:green;"><?php  echo $countPacientOpen?> открытых</span> и <span style = "color:red;"> <?php  echo $countPacientClose?> закрытых </span></p>
    		<input type="submit" class="button" name="submit" value="Сохранить">
    	</form>
    </section>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>