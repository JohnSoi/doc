<?php
  // Подключение сторонних файлов и проверка на неавторизованность
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
	
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Вывод начислений</title>
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
	<meta http-equiv="Cache-Control" content="private">
  <script src="js/jquery.min.js"></script>
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");
  include("includes/Date.php");
?>
<body>
	<div class="wrapper">
			<div class="wrapp">
				<?php
					echo '
					<table>
						<tr>
							<td>Доктор</td>
							<td>Пациент</td>
							<td>Сумма</td>
							<td>Дата</td>
						</tr>
					';
					$incQuery = mysqli_query($connection, "SELECT * FROM incdoc");
					while ($incArr = mysqli_fetch_assoc($incQuery)){
						$docQuery = mysqli_query($connection,"SELECT * FROM usertbl where id =".$incArr['iddoc']);
						$docArr = mysqli_fetch_assoc($docQuery);
						$nameDoc = $docArr['fio'];
						$patQuery = mysqli_query($connection,"SELECT * FROM patient where id =".$incArr['idpat']);
						 
						$patArr = mysqli_fetch_assoc($patQuery);
						
						 $namePat = $patArr['fio'];
						$sum = $incArr['sum'];
						
						$datEx = explode(' ', $incArr['date']);
						$dateEx = explode('/', $datEx[0]);
						$monthDate = $dateEx[1];
						$monthNow = date('m');
						
						if($monthDate == $monthNow)
							echo'
								<tr>
									<td>'.$nameDoc.'</td>
									<td><a href="input.php?flaginput=3&id='.$incArr['idpat'].'">'.$namePat.'</a></td>
									<td>'.$sum.'</td>
									<td>'.$incArr['date'].'</td>
								</tr>
							';
					}
					echo '</table>';
					echo '<a class="button" href="stat.php">Статистика</a>';
				?>
			</div>
	</div>
</body>
</html>