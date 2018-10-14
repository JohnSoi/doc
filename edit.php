<?php 
	session_start();
  	if(!$_SESSION['session_username'])
   		header("Location:login.php");

   	require_once('includes/DB.php'); 
   	include 'includes/Date.php'; 


   	if(isset($_GET['id']))
	   	{
			$id = $_GET['id'];
			$_SESSION['id'] = $id;
	   	}
   		elseif(isset($_SESSION['id'])) 
   			$id = $_SESSION['id'];

	if (isset($_GET['flagedit']))
      	{
      		$typePage = $_GET['flagedit'];
      		$_SESSION['flagedit'] = $typePage;
      	}
      	elseif(isset($_SESSION['flagedit']))
      	{
      		$typePage = $_SESSION['flagedit'];
      	}

    if (isset($_GET['stat']))
      	{
      		$typeStat = $_GET['stat'];
      		$_SESSION['stat'] = $typeStat;
      	}
      	elseif(isset($_SESSION['stat']))
      	{
      		$typeStat = $_SESSION['stat'];
      	}

    if($typePage == 6)
	    {
	    	if(isset($_GET['register']))
	    	{
	    	  if(!empty($_GET['value']))
	    	  {
	    	    $costMest = $_GET['value'];
	    	    $statusMest = $_GET['status'];
	    	    $createMest = mysqli_query($connection, "UPDATE mest SET value = '".$costMest."', status = '".$statusMest."' WHERE id = '".$id."'");
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
    elseif ($typePage == 1)
	    {
	    	//Проверка на нажатие кнопки
	    	if(isset($_GET["register"]))
	   		{	
	    		//Роверка непустот полей
	    		if(!empty($_GET['full_name']) && !empty($_GET['dol']) && !empty($_GET['username']) && !empty($_GET['password'])&& !empty($_GET['value'])) 
	    		{
	    			//Получение значений из полей
	    			$full_name= htmlspecialchars($_GET['full_name']);
	    			$dol=htmlspecialchars($_GET['dol']);
	    			$username=htmlspecialchars($_GET['username']);
	    			$password=htmlspecialchars($_GET['password']);
	    			$value=htmlspecialchars($_GET['value']);
	    			//Текст запроса
	   				$sql=mysqli_query($connection, "UPDATE usertbl SET fio = '".$full_name."', dol = '".$dol."', username = '".$username."', password = '".$password."', value = '".$value."' WHERE id = '".$id."'");
	   				//Проверка успешности
	    			if($sql)
	    			{
	    				$message = "Пользователь успешно изменен!"; 
	    				echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=1\";}, 2500);</script>";
	    			}
	    			else 
	    			{
	    			 	$message = "Ошибка запроса, обратитесь к администратору!";
	    			}
	    		} 
	    		else 
	    		{
	    			$message = "Все поля обязательны для заполнения!";
	    		}
	    	}
	    }
    elseif($typePage == 2)
	    {
	    	if(isset($_GET['submit']))
	        {
	          if(!empty($_GET['name']) & !empty($_GET['cost']))
	          {
	            $name = htmlspecialchars($_GET['name']);
	            $cost = htmlspecialchars($_GET['cost']);
	            $bonus = htmlspecialchars($_GET['bonus']);
	            $dist = htmlspecialchars($_GET['dist']);

	              $sql = "UPDATE items SET name = '".$name."',cost = '".$cost."',dist = '".$dist."',bonus = '".$bonus."' WHERE id = '".$id."'";
	              $query = mysqli_query($connection, $sql);
	              if($query)
	                {
	                  $message = "Изменение успешно";
	                  echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=4\";}, 1500);</script>";
	                }
	              else
	                $message = "Данные не обработаны";
	          }
	          else
	              $message = "Все поля обязательны для заполнения!";         
	        }
	    }
    elseif ($typePage == 7)
	    {
	    	if(isset($_GET['submit']))
	    	{
	    		if (!empty($_GET['name']) & !empty($_GET['date']) & !empty($_GET['tel']))
		    		{
		    	    $name = $_GET['name'];
		    	    $dateBr =  $_GET['date'];
		    	    $tel = $_GET['tel'];
		    	    $ldoc = $_GET['ldoc'];
		    	    if(isset($_GET['doctor']))
		    	      $doctor = $_GET['doctor'];
		    	    $message = 'a';
		    	    if($typeStat == 0)
		    	      $type = "Амбулатория";
		    	    elseif($typeStat == 1)
		    	      $type = 'Стационар';

		    	    if($typeStat == 1)
			    	    {
			    	    	$doc = 'Был принят доктором:'.$doctor;
			    	   		 $pacientUpdate = mysqli_query($connection,"UPDATE patient SET fio = '".$name."', datebirthday = '".$dateBr."', tel = '".$tel."', dist = '".$doc."', doctor = '".$ldoc."' WHERE id='".$id."'");
			    	    }
		    	   	else
		    	   		$pacientUpdate = mysqli_query($connection,"UPDATE patient SET fio = '".$name."', datebirthday = '".$dateBr."', tel = '".$tel."', doctor = '".$ldoc."' WHERE id='".$id."'");
		    	    
		    	    if ($pacientUpdate)
		    	      {
		    	        if($typeStat == 1)
			    	        {
			    	          $setting = mysqli_query($connection, 'SELECT value FROM param WHERE name = "Прием"');
			    	          $data = mysqli_fetch_assoc($setting);
			    	          $value = $data['value'];
			    	          if($_SESSION['ldoc'] != $doctor)
				    	          {
				    	            $query = mysqli_query($connection, "SELECT * FROM usertbl WHERE fio ='".$doctor."'");
				    	            $data = mysqli_fetch_assoc($query);
				    	            $money = $data['money'] + $value;
				    	            $insert = mysqli_query($connection, "UPDATE usertbl SET money = '".$money."' WHERE fio ='".$doctor."'");
				    	            $query = mysqli_query($connection, "SELECT * FROM usertbl WHERE fio ='".$_SESSION['ldoc']."'");
				    	            $data = mysqli_fetch_assoc($query);
				    	            $money = $data['money'] - $value;
				    	            $insert = mysqli_query($connection, "UPDATE usertbl SET money = '".$money."' WHERE fio ='".$_SESSION['ldoc']."'");
				    	          }
				    	    }    	      
		    	        $message = "Запись отредактирована успешно";
		    	      }
		    	      else
		    	        $message = "Ошибка заполнения";
		    		}
	    		 else
	    	    $message = "Заполните все поля";
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
				//Редактирование персонала
				case 1:
					$patientQuery = mysqli_query($connection, "SELECT * FROM usertbl WHERE id = '".$id."'");
					$patArr = mysqli_fetch_assoc($patientQuery);
					echo '
							<div class="container mregister">
	    						<div id="loginin">
	    							<h1>Редактирование пользователя '.$patArr['fio'].'</h1>
	    							<form action="edit.php" id="registerform" method="get" name="registerform">
	    								<p>
	    									<label for="full_name">Полное имя<br>
	    									<input class="input" id="full_name" name="full_name"size="32"  type="text" value="'.$patArr['fio'].'"></label>
	    								</p>
 	    								<p><label for="radio">Выберите тип учетной записи<br>
 	    								';
 	    								switch ($patArr['dol'])
 	    								{
 	    									case 'ddoc':
 	    										echo '
			    									<input name="dol" type="radio" value="ddoc" checked>Дежурный Доктор<br>
		                        					<input name="dol" type="radio" value="doc">Доктор<br>
			    									<input name="dol" type="radio" value="view">Наблюдатель<br>
			    									<input name="dol" type="radio" value="admin">Администратор<br>
			    									<input name="dol" type="radio" value="su">Суперпользователь<br>';
			    								break;
			    							case 'doc':
 	    										echo '
			    									<input name="dol" type="radio" value="ddoc">Дежурный Доктор<br>
		                        					<input name="dol" type="radio" value="doc" checked>Доктор<br>
			    									<input name="dol" type="radio" value="view">Наблюдатель<br>
			    									<input name="dol" type="radio" value="admin">Администратор<br>
			    									<input name="dol" type="radio" value="su">Суперпользователь<br>';
			    								break;
			    							case 'view':
 	    										echo '
			    									<input name="dol" type="radio" value="ddoc">Дежурный Доктор<br>
		                        					<input name="dol" type="radio" value="doc">Доктор<br>
			    									<input name="dol" type="radio" value="view" checked>Наблюдатель<br>
			    									<input name="dol" type="radio" value="admin">Администратор<br>
			    									<input name="dol" type="radio" value="su">Суперпользователь<br>';
			    								break;
			    							case 'admin':
 	    										echo '
			    									<input name="dol" type="radio" value="ddoc">Дежурный Доктор<br>
		                        					<input name="dol" type="radio" value="doc">Доктор<br>
			    									<input name="dol" type="radio" value="view">Наблюдатель<br>
			    									<input name="dol" type="radio" value="admin" checked>Администратор<br>
			    									<input name="dol" type="radio" value="su">Суперпользователь<br>';
			    								break;
			    							case 'su':
 	    										echo '
			    									<input name="dol" type="radio" value="ddoc">Дежурный Доктор<br>
		                        					<input name="dol" type="radio" value="doc">Доктор<br>
			    									<input name="dol" type="radio" value="view">Наблюдатель<br>
			    									<input name="dol" type="radio" value="admin">Администратор<br>
			    									<input name="dol" type="radio" value="su" checked>Суперпользователь<br>';
			    								break;
			    						}
 	    								echo '
	    									</label>
	    								</p>
 	    								<p>
	    									<label for="username">Имя пользователя<br>
	    									<input class="input" id="username" name="username"size="20" type="text" value="'.$patArr['username'].'"></label>
	    								</p>
 	    								<p>
	    									<label for="user_pass">Пароль<br>
	    									<input class="input" id="password" name="password"size="32" type="text" value="'.$patArr['password'].'"></label>
	    								</p>
 	    								<p>
	    									<label for="value">Процентная ставка<br>
	    									<input class="input" id="value" name="value" size="20" type="float" value="'.$patArr['value'].'"></label>
	    								</p>
 	    								<p class="submit">
	    									<input class="button" id="register" name= "register" type="submit" value="Обновить">
	    								</p>
	    				 			</form>
	    						</div>
	    					</div>
					';
					break;
				//Редактирование услуг
				case 2:
					$servQuery = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$id."'");
					$servArr = mysqli_fetch_assoc($servQuery);
					echo '
			        <div class="container mregister">
			            <div id="loginin">
			              <h1>Редактирование услуги "'.$servArr['name'].'"</h1>
			              <form action="edit.php" method="GET">
			                <p><label for="name">Название услуги<br><input name="name" type="text" value="'.$servArr['name'].'"></label></p>
			                <p><label for="cost">Стоимость<br><input name="cost" type="text" value="'.$servArr['cost'].'"></label></p>
			                <p><label for="bonus">Бонус за предоставление<br><input name="bonus" type="text" value="'.$servArr['bonus'].'"></label></p>
			                <p><label for="bonus">Описание<br><input name="dist" type="text" value="'.$servArr['dist'].'"></label></p>
			                <input type="submit" class="button" name="submit" value="Добавить">
			              </form>
			            </div>
			          </div>
			      	';
					break;
				//Вывод списка услуг
				case 3:
					echo '<div class="wrap">';
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
							if ($nameDoc == 'Процедура не выполнена')
								echo '<li>'.$nameServ.'		-	'.$nameDoc.'	-	'.$statServ.'</li>';
							else
								echo '<li style="background: hsl(122, 79%, 50%);">'.$nameServ.'		-	'.$nameDoc.'	-	'.$statServ.'</li>';
							$i++;	
						}
						echo '</ul>';
					}
					if ($dataDB['doctor'] == $dataDOC['fio'])
						echo '<a class = "button" href="add.php?id='.$id.'&flagadd=3">Назначить процедуру</a>';
					echo '</div>';
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
					        <h1>Редактирование койко - места</h1>
					        <form action="edit.php" id="registerform" method="get" name="registerform">
					          <p>
					            <label for="value">Стоимость одного одня проживания<br>
					            <input class="input" id="value" name="value" size="32"  type="text" value="'.$costMest.'"></label>
					          </p>
					          <p>
					            <label for="status">Статус койко - места<br>
					            <select name="status">
					            	<option value="free">Свободно</option>
					            	<option value="busy">Занято</option>
					            </select></label>
					          </p>
					          <p class="submit">
					            <input class="button" id="register" name= "register" type="submit" value="Изменить">
					          </p>
					        </form>
					      </div>
					    </div>
					';	
					break;
				//Редактирование пациента
				case 7:
					$patientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
					$patientArray = mysqli_fetch_assoc($patientQuery);
					echo '
					  <div class="cont-client">';
					    if ($typeStat == 0)
					       echo '<h1>Редактирование пациента '.$patientArray['fio'].' в амбулатории</h1>';
					     else
					      echo '<h1>Редактирование пациента '.$patientArray['fio'].' в стационаре</h1>';
					    echo'
					        <form action="edit.php" method="GET">
					          <p><label for="name">ФИО пациента<br><input name="name" type="text" value="'.$patientArray['fio'].'"></label></p>
					          <p><label for="date">Дата рождения<br><input name="date" type="text" value="'.$patientArray['datebirthday'].'"></label></p>
					          <p><label for="tel">Номер телефона<br><input name="tel" type="tel" value="'.$patientArray['tel'].'"></label></p>';
					          if ($typeStat == 1){
					          	$ldocEx = explode(':',$patientArray['dist']);
					          	$_SESSION['ldoc'] = $ldocEx[1];
					            echo '<p><label for="doctor">Принимающий врач<br><select name="doctor">';
					            echo '<option value="'.$ldocEx[1].'">'.$ldocEx[1].'</option>';
					            $query = "SELECT * FROM usertbl WHERE dol = 'doc' OR dol = 'ddoc'";
					            $sql = mysqli_query($connection, $query);
					            if (mysqli_num_rows($sql) == 0)
					            {
					              echo '<option value="no">Нет данных о врачах</option>';
					            }
					            else
					            {
					              while($row=mysqli_fetch_assoc($sql))
					              echo '<option value="'.$row[fio].'">'.$row[fio].'</option>';
					            }
					            echo'
					            </select></label></p>';
					          }
					            echo '<p><label for="ldoc">Лечащий врач<br><select name="ldoc">';
					            $query = "SELECT * FROM usertbl WHERE dol = 'doc'";
					            $sql = mysqli_query($connection, $query);
					            echo '<option value="'.$patientArray['doctor'].'">'.$patientArray['doctor'].'</option>';
					            if (mysqli_num_rows($sql) == 0)
					            {
					              echo '<option value="no">Нет данных о врачах</option>';
					            }
					            else
					            {
					              while($row=mysqli_fetch_assoc($sql))
					                echo '<option value="'.$row[fio].'">'.$row[fio].'</option>';
					            }
					            echo'
					            </select></label></p>
					            <input type="submit" class="button" name="submit" value="Редактировать">';    
					          echo '
					        </form>
					      </div>
					      <script src="js/zal.js"></script>
					  ';
					break;
				//Выписка пациента
				case 8:
					$mesto = mysqli_query($connection, "SELECT mest FROM patient WHERE id = '".$id."'");
					$mest = mysqli_fetch_assoc($mesto);
					$mest = $mest['mest'];
					$dateNow = $date -> getDateTime();
					$updatePatient = mysqli_query($connection, "UPDATE patient SET status = '0', dateOut = '".$dateNow."' WHERE id = '".$id."'");
					if($updatePatient)
					{
						$updateMesr = mysqli_query($connection, "UPDATE mest SET status = 'free' WHERE id = '".$mest."'");
						$DataBase -> route();
					}
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