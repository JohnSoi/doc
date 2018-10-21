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
    <link rel="stylesheet" href="css/menu.css">
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
    <div class="param">
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
            $operQuery = mysqli_query($connection, "SELECT * FROM operation");
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
    		<p class="left"> Дата последнего изменения:  <strong><?php  echo $lastCH?></strong></p>
    		<p class="left"> Дата последнего backup`а: <strong> <?php  echo $lastBU?></strong></p><hr>
            <p class="left"> Количество строк в таблице Пациенты:  <strong><?php  echo mysqli_num_rows($query);?> из них <?php  echo mysqli_num_rows($queryClose);?> закрыты </strong> (<?php echo 1000-mysqli_num_rows($queryClose);?> строк до очистки [<?php echo mysqli_num_rows($queryClose)/1000*100;?>%])</p>
             <p class="left"> Количество строк в таблице Операции:  <strong><?php  echo mysqli_num_rows($operQuery);?></strong> (<?php echo 10000-mysqli_num_rows($operQuery);?> строк до очистки [<?php echo mysqli_num_rows($operQuery)/10000*100;?>%])</p>
    		<p class="left"> Количество файлов backup`а:  <strong><?php  echo $count?></strong> (<?php echo 100-$count;?> файлов до очистки [<?php echo $count?>%])</p><hr>
    		<p class="left"> Записей о пациентах: <?php  echo $countPacient?> из них <span style = "color:green;"><?php  echo $countPacientOpen?> открытых</span> и<span style = "color:red;"> <?php  echo $countPacientClose?> закрытых </span></p>
    		<input type="submit" class="button" name="submit" value="Сохранить">
    	</form>
        </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>