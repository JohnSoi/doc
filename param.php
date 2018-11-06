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
            $idG = $_GET['id'];
            $idTest = $_GET['test'];
            // Запись значения в БД 
            $changeParam = mysqli_query($connection, "UPDATE param SET value = '".$value."' WHERE name = 'Прием'");
            $changeID = mysqli_query($connection, "UPDATE param SET value = '".$idG."' WHERE name = 'ИД Гель'");
            $changeTest = mysqli_query($connection, "UPDATE param SET value = '".$idTest."' WHERE name = 'ИД Тест'");
            // Выод результата
            if ($changeParam && $changeID && $changeTest)
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
            $idG = $param['ИД Гель'];
            $idTest = $param['ИД Тест'];
            $querySearch = mysqli_query($connection, "SELECT * FROM items WHERE name LIKE '%ель'");
            if (mysqli_num_rows($querySearch) != 0){
                $searchArray = mysqli_fetch_assoc($querySearch);
                $varIdG = $searchArray['id'];
                }
            $querySearch = mysqli_query($connection, "SELECT * FROM items WHERE name LIKE '%ест'");
            if (mysqli_num_rows($querySearch) != 0){
                $searchArray = mysqli_fetch_assoc($querySearch);
                $varIdTest = $searchArray['id'];
                }

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
    	?>
    	<form action="param.php" method="GET">
    		<p><label for="input">Стоимость приема пациента:<br><input name="input" type="text" value=<?php echo $cost; ?>></label></p>
            <p><label for="id">ИД записи с гелем <?php if(isset($varIdG)) echo '('.$varIdG.')'; ?><br><input name="id" type="text" value=<?php echo $idG; ?>></label></p>
            <p><label for="id">ИД записи Тест <?php if(isset($varIdTest)) echo '('.$varIdTest.')'; ?><br><input name="test" type="text" value=<?php echo $idTest; ?>></label></p>
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