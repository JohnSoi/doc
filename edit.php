<?php 
	session_start();
  	if(!$_SESSION['session_username'])
   		header("Location:login.php");

   	require_once('includes/DB.php'); 

   	if(isset($_GET['id']))
   	{
		$id = $_GET['id'];
		$_SESSION['id'] = $id;
   	}
   	else 
   		$id = $_SESSION['id'];
	if (isset($_GET['flagedit']))
      	{
      		$typePage = $_GET['flagedit'];
      		$_SESSION['flagedit'] = $typePage;
      	}
      	else
      	{
      		$typePage = $_SESSION['flagedit'];
      	}
    if($typePage = 6)
    {
    	if(isset($_GET['register']))
    	{
    	  if(!empty($_GET['value']))
    	  {
    	    $costMest = $_GET['value'];
    	    $createMest = mysqli_query($connection, "UPDATE mest SET value = '".$costMest."' WHERE id = '".$id."'");
    	    if($createMest)
    	    {
    	      $message = 'Место изменено';
    	      echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=6\";}, 100);</script>";
    	    }
    	    else
    	      $message = 'Ошибка ввода';
    	  }
    	  else
    	    $message = 'Заполните поле Стоимость';
    	}
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Редактирование</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="add">
		<?php	
		if (!empty($message)) 
	    		echo "<p class=\"error\">" . "Сообщение: ". $message . "</p>";
			switch($typePage)
			{
				//Вывод списка услуг
				case 3:
					$query = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
					$doctor = mysqli_query($connection, "SELECT * FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
					$dataDOC = mysqli_fetch_assoc($doctor);
					$idDoctor = $dataDOC['id'];
					$dataDB = mysqli_fetch_assoc($query);
					$nameCl = $dataDB['fio'];
					echo '<h1 align = "center"><strong>'.$nameCl.'</strong></h1>';
					if(empty($dataDB['sp_uslug']))
						echo '<h1>Нет назначенных процедур</h1>';
					else
					{
						echo '<h2>Список услуг пациента:</h2>';
						echo '<ul>';
						$services = $dataDB['sp_uslug'];
						$listServ = explode(',', $services);
						$countServ = count($listServ);
						$i = 0;
						while ($i < $countServ) {
							$exListServ = explode('-', $listServ[$i]);
							$idServ = $exListServ[0];
							$idDoc = $exListServ[1];
							$statusServ = $exListServ[2];

							$query = mysqli_query($connection, "SELECT name FROM items WHERE id= '".$idServ."'");
							$data = mysqli_fetch_assoc($query);
							$nameServ = $data['name'];

							if ($idDoc == 0)
								$nameDoc = 'Процедура не выполнена';
							else
							{
								$query = mysqli_query($connection, "SELECT fio FROM usertbl WHERE id= '".$idDoc."'");
								$data = mysqli_fetch_assoc($query);
								$nameDoc = $data['fio'];	
							}

							if($statusServ == 0)
								if($_SESSION['typeUser'] == 'doc')
									$statServ = '<a href="edit.php?flagedit=5&idPac='.$id.'&idDoc='.$idDoctor.'&idArr='.$i.'">Выполнил</a>';
								else
									$statServ = 'Не выполнено';
							elseif($statusServ == 1)
								$statServ = 'Выполнено';

							echo '<li>'.$nameServ.'		-	'.$nameDoc.'	-	'.$statServ.'</li>';
							$i++;	
						}
						echo '</ul>';
					}
					if ($dataDB['doctor'] == $dataDOC['fio'])
						echo '<a class = "button" href="add.php?id='.$id.'&flagadd=3">Назначить процедуру</a>';
					break;
				//Стать лечащим врачем
				case 4:
					$doctor = mysqli_query($connection, "SELECT fio FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
					$data = mysqli_fetch_assoc($doctor);
					$query = mysqli_query($connection, "UPDATE patient SET doctor = '".$data['fio']."' WHERE id = '".$id."'");
					echo "<script>setTimeout(function(){history.back();}, 50);</script>";
					break;
				//Установка статуса Выполнено услуги и начисление з/п
				case 5:
						//Получение данных из запроса
						$idPatient = $_GET['idPac'];
						$idDoctor = $_GET['idDoc'];
						$idArrayService = $_GET['idArr'];

						//Данные о пациентах храняться в ассоциативном массиве
						$PatientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPatient."'");
						$dataDB = mysqli_fetch_assoc($PatientQuery);
						
						$services = $dataDB['sp_uslug'];
						$listServ = explode(',', $services);
						$countServ = count($listServ);
						$i = 0;
						$listServIn = '';
						while ($i < $countServ) {
							if($i == $idArrayService)
							{
								$exListServ = explode('-', $listServ[$i]);
								$idServ = $exListServ[0];
								$exListServ[1] = $idDoctor;
								$exListServ[2] = 1;
								$listServ[$i] = $idServ.'-'.$exListServ[1].'-'.$exListServ[2];
							}
							if($i != 0)
							{
								$listServ[$i] = ','.$listServ[$i];
							}
							$listServIn .= $listServ[$i];
							$i++;
						}
						
						//Данные об услугах храняться в ассоциативном массиве
						$ServicesQuery = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$idServ."'");
						$dataServ = mysqli_fetch_assoc($ServicesQuery);
						//Данные о докторах храняться в ассоциативном массиве
						$DocQuery = mysqli_query($connection, "SELECT * FROM usertbl WHERE id = '".$idDoctor."'");
						$dataDoc = mysqli_fetch_assoc($DocQuery);
						//Переменная стоимости услуги
						$cost = $dataServ['cost'];
						//Переменная бонуса от услуги
						$bonus = $dataServ['bonus'];

						//Проверка наличия параметра бонуса
						if ($bonus == 0)
						{
							//Если бонуса нет, назначается процент от стоимости 
							$percentDoc = $dataDoc['value'];
							//Сумма для пополнения кошелька доктора процентом от стоимости
							$inSumDoc = $cost * $percentDoc / 100;
						}
						else
							//Сумма пополнеиия кошелька бонусом от услуги
							$inSumDoc = $bonus;

						//Увеличение текущей зарплаты врача на значение, описанное выше
						$inSumDoc = $dataDoc['money'] + $inSumDoc;

						//Запись новой зарплаты
						$insertDocQuery = mysqli_query($connection, "UPDATE usertbl SET money = '".$inSumDoc."' WHERE id = '".$idDoctor."'");

						//Счетчик услуг
						$countServ = $dataDoc['uslugi'] + 1;
						//Запись значения услуг
						$insertDocQuery = mysqli_query($connection, "UPDATE usertbl SET uslugi = '".$countServ."' WHERE id = '".$idDoctor."'");

						$sumPatient = $dataDB['sumNow'] + $cost;
						$insertPatQuery = mysqli_query($connection, "UPDATE patient SET sumNow = '".$sumPatient."' WHERE id = '".$idPatient."'");	
						$insertPatQuery = mysqli_query($connection, "UPDATE patient SET sp_uslug = '".$listServIn."' WHERE id = '".$idPatient."'");		
						echo "<script>setTimeout(function(){history.back();}, 50);</script>";
						break;
				//Редактирование койко - места
				case 6:
					$costMestQuery = mysqli_query($connection, "SELECT value FROM mest WHERE id = '".$id."'");
					$costMest = mysqli_fetch_assoc($costMestQuery);
					$costMest = $costMest['value'];
					echo '
					  <div class="container mregister">
					      <div id="loginin">
					        <h1>Добавление нового койко - места</h1>
					        <form action="edit.php" id="registerform" method="get" name="registerform">
					          <p>
					            <label for="value">Стоимость одного одня проживания<br>
					            <input class="input" id="value" name="value" size="32"  type="text" value="'.$costMest.'"></label>
					          </p>
					          <p class="submit">
					            <input class="button" id="register" name= "register" type="submit" value="Изменить">
					          </p>
					        </form>
					      </div>
					    </div>
					';	
					break;
			}
		 ?>
     </section>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>