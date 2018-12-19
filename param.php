<?php
    // Проверка на авторизованность
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
    // Подключение сторонних файлов
	include("includes/DB.php");
	include('includes/DBOper.php');

    // Проверка на нажатие клавиши
	if(isset($_GET['submit']))
        {
            // Получение данных из запроса
            $value = $_GET['input'];
            $ads = $_GET['ads'];
            $disp = $_GET['disp'];
            $agents = $_GET['agents'];
            // Запись значения в БД 
            $changeParam = mysqli_query($connection, "UPDATE param SET value = '".$value."' WHERE name = 'Прием'");
            $changeAds = mysqli_query($connection, "UPDATE param SET value = '".$ads."' WHERE name = 'Реклама'");
            $changeDisp = mysqli_query($connection, "UPDATE param SET value = '".$disp."' WHERE name = 'Диспетчеры'");
            $changeAg = mysqli_query($connection, "UPDATE param SET value = '".$agents."' WHERE name = 'Агенты'"); 
            // Выод результата
            if ($changeParam && $changeAds && $changeDisp && $changeAg)
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
        // Подключение меню и вывод сообщения при наличие
			include('includes/menu.php');
			if (!empty($message)) 
	    		echo "<p class=\"error\">" . "Сообщение: ". $message . "</p>";	
		?>
  <div class="content">
    <div class="param">
    	<?php 
            // Получение значений и занесение из в массив
    		$param = array();
    		$query = mysqli_query($connection, "SELECT * FROM param");
    		if (mysqli_num_rows($query) == 0)
    			$cost = 0;
    		else
    		while ($data = mysqli_fetch_assoc($query)) 
    		{
    			$param[$data['name']] = $data['value'];
    		}
            // Присвоение значений переменным
    		$cost = $param['Прием'];
    		$lastCH = $param['Последнее изменение'];
    		$lastBU = $param['Последняя копия'];
            // Вывод количества файлов
    		$count = $DBO -> countFile(); 
            // Запросы для счетчиков
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
            // Подсчет пациентов по категориям
            while ($row = mysqli_fetch_assoc($queryA)){
                $sumA += $row['sum'];
            }
            while ($row = mysqli_fetch_assoc($queryS)){
                $sumS += $row['sum'];
            }

            $paramQuery = mysqli_query($connection, "SELECT * FROM param");
            while($dataDB = mysqli_fetch_assoc($paramQuery))
            {
                $nameParam = $dataDB['name'];

                if($nameParam == 'Диспетчеры')
                    $dispList = (string)$dataDB['value'];
                elseif($nameParam == 'Реклама')
                    $adsList = (string)$dataDB['value'];
                elseif($nameParam == 'Агенты')
                    $agentsList = (string)$dataDB['value'];
            }

    	?>
    	<form action="param.php" method="GET">
    		<p><label for="input">Стоимость приема пациента:<br><input name="input" type="text" value=<?php echo $cost; ?>></label></p>
            <?php echo '<p><label for="ads">Список рекламы<br><input type="text" name="ads" value="'.$adsList.'"><span style="font-family: sans-serif; font-size: 10px; color: grey;">Введите значения через запятую</span></label></p>
            <p><label for="disp">Список диспечеров<br><input type="text" name="disp" value="'.$dispList.'"><span style="font-family: sans-serif; font-size: 10px; color: grey;">Введите значения через запятую</span></label></p>
            <p><label for="agents">Список агентов<br><input type="text" name="agents" value="'.$agentsList.'"><span style="font-family: sans-serif; font-size: 10px; color: grey;">Введите значения через запятую</span></label></p>';  ?>
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