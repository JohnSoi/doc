<?php 
	/* --- Проверка на авторизованность --- */	
	session_start();
  	if(!$_SESSION['session_username'])
   		header("Location:login.php");
	/* --- Подключение сторонних файлов  --- */
   	require_once('includes/DB.php'); 
   	include 'includes/Date.php'; 

	/* --- Проверк аналичия параметров и установка их в сессии --- */
   	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$idPati = $id;
		$_SESSION['id'] = $id;
	   	}
   	elseif(isset($_SESSION['id'])){ 
   		$id = $_SESSION['id'];
		$idPati = $id;
	}

	if (isset($_GET['flagedit'])){
      	$typePage = $_GET['flagedit'];
      	$_SESSION['flagedit'] = $typePage;
      	}
      elseif(isset($_SESSION['flagedit']))
      		$typePage = $_SESSION['flagedit'];

    if (isset($_GET['stat'])){
      	$typeStat = $_GET['stat'];
      	$_SESSION['stat'] = $typeStat;
      	}
    elseif(isset($_SESSION['stat']))
      	$typeStat = $_SESSION['stat'];

  /* --- Обработчики --- */
	/* --- Койко - мест --- */
    if($typePage == 6){
	    if(isset($_GET['register'])){
	    	if(!empty($_GET['value'])){
	    	    $costMest = $_GET['value'];
	    	    $statusMest = $_GET['status'];
	    	    $createMest = mysqli_query($connection, "UPDATE mest SET value = '".$costMest."', status = '".$statusMest."' WHERE id = '".$id."'");
	    	    if($createMest) {
	    	      $message = 'Место изменено';
				  $DataBase->route();	    	    
				  }
	    	    else
	    	      $message = 'Ошибка ввода';
	    	    }
	    	else
	    		$message = 'Заполните поле Стоимость';
	    	}
	    }
	/* --- Редактирование пользователя --- */
    elseif ($typePage == 1){
	    //Проверка на нажатие кнопки
	    if(isset($_GET["register"])){	
	    	//Проверка непустот полей
	    	if(!empty($_GET['full_name']) && !empty($_GET['dol']) && !empty($_GET['username']) && !empty($_GET['password'])) {
	    		//Получение значений из полей
	    		$full_name= htmlspecialchars($_GET['full_name']);
	    		$dol=htmlspecialchars($_GET['dol']);
	   			$username=htmlspecialchars($_GET['username']);
	   			$password=htmlspecialchars($_GET['password']);
	   			$value=htmlspecialchars($_GET['value']);
	   			//Текст запроса
   				$sql=mysqli_query($connection, "UPDATE usertbl SET fio = '".$full_name."', dol = '".$dol."', username = '".$username."', password = '".$password."', value = '".$value."' WHERE id = '".$id."'");
	   			//Проверка успешности
	   			if($sql){
	    			$message = "Пользователь успешно изменен!"; 
					$DataBase->route();	    			
					}
	    		else 
	    			 $message = "Ошибка запроса, обратитесь к администратору!";
	    		} 
	    	else 
	    		$message = "Все поля обязательны для заполнения!";
	    	}
	    }
	/* --- Редактирование услуги --- */
    elseif($typePage == 2){
	    if(isset($_GET['submit'])){
	        if(!empty($_GET['name'])){
	            $name = htmlspecialchars($_GET['name']);
	            $cost = htmlspecialchars($_GET['cost']);
	            $bonus = htmlspecialchars($_GET['bonus']);
	            $bonusN = htmlspecialchars($_GET['bonusN']);
	            $dist = htmlspecialchars($_GET['dist']);

	            $sql = "UPDATE items SET name = '".$name."',cost = '".$cost."',dist = '".$dist."',bonus = '".$bonus."',bonusN = '".$bonusN."' WHERE id = '".$id."'";
	            $query = mysqli_query($connection, $sql);
	            if($query){
	                  $message = "Изменение успешно";
					  $DataBase->route();	                
					  }
	            else
	                $message = "Данные не обработаны";
	        	}
	        else
	            $message = "Все поля обязательны для заполнения!";         
	        }
	    }
	/* --- Редактирование пациента --- */    
    elseif ($typePage == 7){
	    if(isset($_GET['submit'])){
	    	if (!empty($_GET['name']) & !empty($_GET['date']) & !empty($_GET['tel'])){
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

		    	if($typeStat == 1) {
			    	$doc = 'Был принят доктором:'.$doctor;
			    	$pacientUpdate = mysqli_query($connection,"UPDATE patient SET fio = '".$name."', datebirthday = '".$dateBr."', tel = '".$tel."', dist = '".$doc."', doctor = '".$ldoc."' WHERE id='".$id."'");
			    	}
		    	else
		    	   	$pacientUpdate = mysqli_query($connection,"UPDATE patient SET fio = '".$name."', datebirthday = '".$dateBr."', tel = '".$tel."', doctor = '".$ldoc."' WHERE id='".$id."'");
		    	    
		    	if ($pacientUpdate){
		    	    if($typeStat == 1){
			    	    $setting = mysqli_query($connection, 'SELECT value FROM param WHERE name = "Прием"');
			    	    $data = mysqli_fetch_assoc($setting);
			    	    $value = $data['value'];
			    	    if($_SESSION['ldoc'] != $doctor){
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
		    	    $DataBase->route();
		    	    }
		    	else
		    	   	$message = "Ошибка заполнения";
		    	}
	    	else
	    	    $message = "Заполните все поля";
	    	}
		}
	/* --- Редактирование номера карты --- */
	elseif ($typePage == 10) {
		if(isset($_GET['submit'])){
			$newCard = $_GET['idNew'];
		 		$updateId = mysqli_query($connection, "UPDATE patient SET numCard = '".$newCard."' WHERE id = '".$id."'");
		 		if($updateId)
		 			header("Location:input.php?flaginput=3&id=".$id);
			}
	 }
	elseif ($typePage == 13) {
		if(isset($_GET['submit'])){
			$newMest = $_GET['mestN'];

			$updateId = mysqli_query($connection, "UPDATE patient SET currnet_mest = '".$newMest."' WHERE id = '".$id."'");
			if($updateId)
		 		header("Location:input.php?flaginput=3&id=".$id);
	 }
	}
	?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Редактирование</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/menu.css">
		<meta http-equiv="Cache-Control" content="private">
	</head>
	<body>
		<div class="wrapper">
			<?php
				/* --- Подключение меню --- */
				include('includes/menu.php');
			?>
	  		<div class="content">
	    		<section class="add">
					<?php
						/* --- Вывод сообщения при наличии --- */	
						if (!empty($message)) 
				    		echo "<p class=\"error\">" . "Сообщение: ". $message . "</p>";
				    	/* --- Вывод в зависисмости от параметров --- */
						switch($typePage){
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
					                     			<select name="dol" id="dol">';
			 	    									switch ($patArr['dol']){
				 	    									case 'ddoc':
				 	    										echo '
							    									<option value="ddoc">Дежурный Доктор</option>
						                        					<option value="doc">Доктор</option>
							    									<option value="view">Наблюдатель</option>
							    									<option value="admin">Администратор</option>
							    									<option value="su">Суперпользователь</option>';
							    								break;
							    							case 'doc':
				 	    										echo '
				 	    											<option value="doc">Доктор</option>
							    									<option value="ddoc">Дежурный Доктор</option>
							    									<option value="view">Наблюдатель</option>
							    									<option value="admin">Администратор</option>
							    									<option value="su">Суперпользователь</option>';
							    								break;
							    							case 'view':
				 	    										echo '
				 	    											<option value="view">Наблюдатель</option>
							    									<option value="ddoc">Дежурный Доктор</option>
						                        					<option value="doc">Доктор</option>
							    									<option value="admin">Администратор</option>
							    									<option value="su">Суперпользователь</option>';
							    								break;
							    							case 'admin':
				 	    										echo '
				 	    											<option value="admin">Администратор</option>
							    									<option value="view">Наблюдатель</option>
							    									<option value="ddoc">Дежурный Доктор</option>
						                        					<option value="doc">Доктор</option>
							    									<option value="su">Суперпользователь</option>';
							    								break;
							    							case 'su':
				 	    										echo '
				 	    											<option value="su">Суперпользователь</option>
							    									<option value="admin">Администратор</option>
							    									<option value="view">Наблюдатель</option>
							    									<option value="ddoc">Дежурный Доктор</option>
						                        					<option value="doc">Доктор</option>
							    									';
							    								break;
							    							}
			 	    								echo '</select>
					    						</label></p>
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
				    				</div>';
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
						                <p><label for="bonusN">Бонус за назначение<br><input name="bonusN" type="text" value="'.$servArr['bonusN'].'"></label></p>
						                <p><label for="dist">Описание<br><input name="dist" type="text" value="'.$servArr['dist'].'"></label></p>
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
									else{
										echo '<h2>Список услуг пациента:</h2>';
										echo '<ul>';
											$services = $dataDB['sp_uslug'];
											$listServ = explode(',', $services);
											$countServ = count($listServ);
											$i = 0;
											while ($i < $countServ){
												$exListServ = explode('-', $listServ[$i]);
												$idServ = $exListServ[0];
												$idDoc = $exListServ[1];
												$statusServ = $exListServ[2];

												$query = mysqli_query($connection, "SELECT name FROM items WHERE id= '".$idServ."'");
												$data = mysqli_fetch_assoc($query);
												$nameServ = $data['name'];

												if ($idDoc == 0)
													$nameDoc = 'Процедура не выполнена';
												else{
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
							//Установка статуса Выполнено услуги 
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
								while ($i < $countServ){
									if($i == $idArrayService){
										$exListServ = explode('-', $listServ[$i]);
										$idServ = $exListServ[0];
										$exListServ[2] = $idDoctor;
										$exListServ[3] = 1;
										$dateNow = $date->getDateTime();
										if(isset($exListServ[6]))
											$listServ[$i] = $idServ.'-'.$exListServ[1].'-'.$exListServ[2].'-'.$exListServ[3].'-'.$dateNow.'-'.$exListServ[5].'-'.$exListServ[6];
										else
											$listServ[$i] = $idServ.'-'.$exListServ[1].'-'.$exListServ[2].'-'.$exListServ[3].'-'.$dateNow.'-'.$exListServ[5];
										}
									if($i != 0)
										$listServ[$i] = ','.$listServ[$i];
									$listServIn .= $listServ[$i];
									$i++;
									}
									
									//Данные об услугах храняться в ассоциативном массиве
								$ServicesQuery = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$idServ."'");
								$dataServ = mysqli_fetch_assoc($ServicesQuery);
								//Данные о докторах храняться в ассоциативном массиве
								$DocQuery = mysqli_query($connection, "SELECT * FROM usertbl WHERE id = '".$idDoctor."'");
								$dataDoc = mysqli_fetch_assoc($DocQuery);
									
								//Счетчик услуг
								$countServ = $dataDoc['uslugi'] + 1;
								//Запись значения услуг
								$insertDocQuery = mysqli_query($connection, "UPDATE usertbl SET uslugi = '".$countServ."' WHERE id = '".$idDoctor."'");

								$sumPatient = $dataDB['sumNow'] + $dataServ['cost'];
								$insertPatQuery = mysqli_query($connection, "UPDATE patient SET sumNow = '".$sumPatient."' WHERE id = '".$idPatient."'");	
								$insertPatQuery = mysqli_query($connection, "UPDATE patient SET sp_uslug = '".$listServIn."' WHERE id = '".$idPatient."'");		
								echo "<script>setTimeout(function(){history.back();}, 50);</script>";
								break;
							//Редактирование койко - места
							case 6:
								$costMestQuery = mysqli_query($connection, "SELECT * FROM mest WHERE id = '".$id."'");
								$costMest = mysqli_fetch_assoc($costMestQuery);
								$nameMest = $costMest['status'];
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
								            <label for="status">Тип койко - места<br>
								            <input class="input" id="status" name="status" size="32"  type="text" value="'.$nameMest.'"></label>
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
									            echo '<p><label for="doctor">Принимающий врач<br>
									            	<select name="doctor">';
									            		echo '<option value="'.$ldocEx[1].'">'.$ldocEx[1].'</option>';
									            		$query = "SELECT * FROM usertbl WHERE dol = 'doc' OR dol = 'ddoc'";
											            $sql = mysqli_query($connection, $query);
											            if (mysqli_num_rows($sql) == 0)
											              echo '<option value="no">Нет данных о врачах</option>';
											            else
											              while($row=mysqli_fetch_assoc($sql))
											              	echo '<option value="'.$row[fio].'">'.$row[fio].'</option>';

											            echo'
									            	</select>
									            </label></p>';
									          	}
								          echo '<p><label for="ldoc">Лечащий врач<br>
								          	<select name="ldoc">';
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
									         echo'</select>
									       </label></p>
								           <input type="submit" class="button" name="submit" value="Редактировать">';    
								        echo '</form>
								  </div>
								  <script src="js/zal.js"></script>';
								break;
							//Выписка пациента и начисление з/п
							case 8:
								$dateNow = $date -> getDateTime();
								$updatePatient = mysqli_query($connection, "UPDATE patient SET status = '0' WHERE id = '".$id."'");
								if($updatePatient){
									//Запрос данных пациента
									$PatientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
									$dataDB = mysqli_fetch_assoc($PatientQuery);

									//Присваение переменным значений из данных
									$services = $dataDB['sp_uslug'];
									$mestD = $dataDB['mest'];
									$nameLDoc = $dataDB['doctor'];

									//Подсчет стоимости койко дней
									$allsumMest = 0;
									$listMest = explode(',', $mestD);
									$countDay = count($listMest);
									$i = 0;
									$countAllDay = 0;
									/* --- Цикл вывода данных --- */
									if(!empty($dataDB['mest']))
										while ($i<$countDay){
											$expMest= explode('-', $listMest[$i]);
											$id = $expMest[0];
											$countD = $expMest[1];
											$countAllDay += $countD;
											$mestQuery =mysqli_query($connection, "SELECT * FROM mest WHERE id = '".$id."'");
											$mestArr = mysqli_fetch_assoc($mestQuery);
											$costMest = $mestArr['value'];
											$nameMest = $mestArr['status'];
											//$allsumMest += $costMest*$countD*0.08;
											$i++;
											}
									$sumDay = $countAllDay * 50;
									$dateDAy = date('m').'.'.date('Y');
									$sumInDay = mysqli_query($connection, 'SELECT * FROM sumInDay WHERE month = "'.$dateDAy.'"');
									if(mysqli_num_rows($sumInDay)){
									    $dataDay = mysqli_fetch_assoc($sumInDay);
									    $dataDay['value'] += $sumDay;
                                        mysqli_query($connection, 'INSERT INTO sumInDay(value) VALUES("'.$sumDay.'") WHERE month = "'.$dateDAy.'"');
                                    }
									else{
									    mysqli_query($connection, 'INSERT INTO sumInDay(month, value) VALUES("'.$dateDAy.'","'.$sumDay.'")');
                                    }
									if(!isset($allsumMest))
										$allsumMest = 0;
									echo 'Стоимость за проживание: '.$allsumMest;

									//РАзделение услуг
									$listServ = explode(',', $services);
									$countServ = count($listServ);
									$i = 0;

									//Поиск услуг Геля и ХимЗащиты
									while ($i < $countServ){
										$exListServ = explode('-', $listServ[$i]);
										$idServ = $exListServ[0];
										$ServicesQuery = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$idServ."'");
										$dataServ = mysqli_fetch_assoc($ServicesQuery);
										$nameServ = $dataServ['name'];
										$exName = explode(' ', $nameServ);
										if((strpos($nameServ,'Эспераль-гель') !== false)){
											if(isset($exListServ[6]))
												echo $cost_g = $exListServ[6];
											else
											    echo $cost_g = $dataServ['cost'];
											}
										if((strpos($nameServ,'Химзащита') !== false)){
											if(isset($exListServ[6]))
												echo $cost_h = $exListServ[6];
											else
											   echo $cost_h = $dataServ['cost'];
											}								
										$i++;
										}
									if(!isset($cost_g))
										$cost_g = 0;
									if(!isset($cost_h))
										$cost_h = 0;

									echo '<br>';
									echo 'Стоимость Геля: '.$cost_g;
									echo '<br>';
									echo 'Стоимость ХЗ: '.$cost_h;
									echo '<br>';

									//Поиск тестов Геля и ХЗ
									$i = 0;
									while ($i < $countServ){
										$exListServ = explode('-', $listServ[$i]);
										$idServ = $exListServ[0];
										$ServicesQuery = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$idServ."'");
										$dataServ = mysqli_fetch_assoc($ServicesQuery);
										$nameServ = $dataServ['name'];
										if((strpos($nameServ,'эспераль-гель') !== false)){
											$idT = $exListServ[0];
											}
										if((strpos($nameServ,'химзащита') !== false)){
											$idH = $exListServ[0];
											}
										$i++;
										}

									//Если записей не обнаружено, то сделать переменные пустыми
									if(!isset($idT))
										$idT = '';
									if(!isset($idH))
										$idH = '';


									echo '<br>';
									echo 'ИД теста Геля: '.$idT;
									echo '<br>';
									echo 'ИД теста ХЗ: '.$idH;
									echo '<br>';

									$items = array();

									$i=0;
									if(!empty($services))
									    while ($i < $countServ){
											$exListServ = explode('-', $listServ[$i]);
											$idServ = $exListServ[0];
											$idDoctor = $exListServ[2];
											$idDoctorN = $exListServ[1];
											$status = $exListServ[3];
																						
											$ServicesQuery = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$idServ."'");
											$dataServ = mysqli_fetch_assoc($ServicesQuery);
											$bonus = $dataServ['bonus'];
											$cost = $dataServ['cost'];
											$bonusN = $dataServ['bonusN'];
											
											//Вариант, с указанием суммы
											if(isset($exListServ[6]))
												$cost = $exListServ[6];

											if($status == 1)
												$items[] = array('id' => $idServ, 'docN' => $idDoctorN, 'docV' => $idDoctor, 'cost' => $cost, 'bonus' => $bonus, 'bonusN' => $bonusN);

											$i++;
										}

									//print_r($items);

									//Создание массива докторов
									$doctorArr = array();
									$countItems = count($items);
									for ($i=0; $i < $countItems; $i++) { 
										$doctorArr[] = $items[$i]['docN'];
										$doctorArr[] = $items[$i]['docV'];
									}

									//Удаление дубликатов и приведение к нормальному виду ключей массива
									$doctorArr = array_unique($doctorArr);
									$doctorArr = array_values($doctorArr);

									//print_r($doctorArr);

									//Создания массива докторов с их ставкой и текущим значением зп
									$doctorArrInf = array();
									$countDA = count($doctorArr);
									for ($i=0; $i < $countDA; $i++) {
										$doctorQuery = mysqli_query($connection, "SELECT * FROM usertbl WHERE id = '".$doctorArr[$i]."'");
										$doctorArray = mysqli_fetch_assoc($doctorQuery); 
										$doctorArrInf[$doctorArr[$i]] = array('value' => $doctorArray['value'], 'money' => $doctorArray['money']);
									}

									// print_r($doctorArrInf);

									//Создание массива с данными для обновления в БД
									$doctorMoney = array();
									$countItems = count($items);
									for ($i=0; $i < $countItems; $i++) { 
										$idItem = $items[$i]['id'];
										echo '<br>';
										if($items[$i]['id'] == $idT){
											echo 'Обнаружен тест ЭГ с начислением ';
											echo $costV = $cost_g*$items[$i]['bonus'];
											echo '<br>';
											echo '<br>';
											$costN = 0;
										}
										elseif($items[$i]['id'] == $idH){
											echo 'Обнаружен тест ХЗ с начислением ';
											echo $costV = $cost_h*$items[$i]['bonus'];
											echo '<br>';
											echo '<br>';
											$costN = 0;
										}
										else{
											if($items[$i]['bonus'] == 0)
											{
												echo "Процентное начисление за выполнение ".$items[$i]['docV'].' ';
												echo $costV = $items[$i]['cost']*$doctorArrInf[$items[$i]['docV']]['value']/100;
												echo '<br>';
											}
											else{
												echo 'Начиcление бонуса за выполнение '.$items[$i]['docV'].' ';
												if ($items[$i]['bonus']<1)
													echo $costV = $items[$i]['cost']*$items[$i]['bonus'];
												else
													echo $costV = $items[$i]['bonus'];
												echo '<br>';
											}
											$queryType =mysqli_query($connection, "SELECT * FROM usertbl WHERE id = '".$items[$i]['docN']."'");
											$typeArr = mysqli_fetch_assoc($queryType);
											$doctorType = $typeArr['dol'];
											if($items[$i]['bonusN'] == 0)
											{
												echo "Процентное начисление за назначение ".$items[$i]['docN'].' ';
												if ($doctorType == 'ddoc')
													echo $costN = 0;
												else
													echo $costN = $items[$i]['cost']*$doctorArrInf[$items[$i]['docN']]['value']/100;
												echo '<br>';
												echo '<br>';
											}
											else
											{
												echo 'Начиcление бонуса за назначение '.$items[$i]['docN'].' ';
												if ($doctorType == 'ddoc')
													echo $costN = 0;
												else{
													if ($items[$i]['bonusN']<1)
														echo $costN = $items[$i]['cost']*$items[$i]['bonusN'];
													else
														echo $costN = $items[$i]['bonusN'];
													}
												echo '<br>';
												echo '<br>';
											}
										}

										if(!isset($costV))
											$costV = 0;
										if(!isset($costN))
											$costN = 0;


										if(!isset($doctorMoney[$items[$i]['docV']]['money']))
											$moneyNow = 0;
										else
											$moneyNow = $doctorMoney[$items[$i]['docV']]['money'];
										if(!isset($doctorMoney[$items[$i]['docN']]['money']))
											$moneyNowN = 0;
										else
											$moneyNowN = $doctorMoney[$items[$i]['docN']]['money'];
										echo $costV;
										if ($items[$i]['docV'] == $items[$i]['docN'])
											$doctorMoney[$items[$i]['docV']] = array('money' => $moneyNow + $costV + $costN);
										else{
											$doctorMoney[$items[$i]['docV']] = array('money' => $moneyNow + $costV);
											$doctorMoney[$items[$i]['docN']] = array('money' => $moneyNowN + $costN);
										}
									}

									print_r($doctorMoney);

									//Поиск лечащего врача
									$sumNowDocDC = mysqli_query($connection, "SELECT * FROM usertbl WHERE fio = '".$nameLDoc."'");
									$dcArr = mysqli_fetch_assoc($sumNowDocDC);
									$idDocL = $dcArr['id'];

									//Перебор массива и добавление данных
									$keyArr = array_keys($doctorMoney);
									$countMoneyDoc = count($keyArr);
									for ($i=0; $i < $countMoneyDoc; $i++) {
									if($keyArr[$i] != $idDocL){
										echo 'Доктору ';
										echo $idDocIn = $keyArr[$i];
										echo ' будет записано '.$sumIn = $doctorArrInf[$keyArr[$i]]['money'] + $doctorMoney[$keyArr[$i]]['money'];
										echo '<br>';
									}
									else{
										echo 'ДокторуL ';
										echo $idDocIn = $keyArr[$i];
										echo ' будет записано '.$sumIn = $doctorArrInf[$keyArr[$i]]['money'] + $doctorMoney[$keyArr[$i]]['money']+$allsumMest;
										echo '<br>';
									}
										$updateSum = mysqli_query($connection, "UPDATE usertbl SET money = '".$sumIn."' WHERE id = '".$keyArr[$i]."'");
									}
									if(empty($services)){
										$doctorQueryL = mysqli_query($connection, "SELECT * FROM usertbl WHERE fio = '".$nameLDoc."'");
										$doctorArrayL = mysqli_fetch_assoc($doctorQueryL); 
										$doctorMoneyL = $doctorArrayL['money'];
										echo '<br>';
										echo $newMoneyDoctor = $doctorMoneyL + +$allsumMest;
										
										$updateDoctorLMoney = mysqli_query($connection, "UPDATE usertbl SET money = '".$newMoneyDoctor."' WHERE fio = '".$nameLDoc."'");
										
									}
									
									$keyArr = array_keys($doctorMoney);
									$countMoneyDoc = count($keyArr);
									for ($i=0; $i < $countMoneyDoc; $i++) {
										echo $keyArr[$i];
										$incQuery = mysqli_query($connection, "INSERT INTO incdoc(iddoc, idpat, sum, date) VALUES ('".$keyArr[$i]."', '".$idPati."', '".$doctorMoney[$keyArr[$i]]['money']."','".$date->getDateTime()."')");
									}

									// Переход к карте
									if($updateSum || $updateDoctorLMoney){
										$_SESSION['link'] = 'input.php?flaginput=3&id='.$id;
										$DataBase -> route();
									}
									}
								
								break;
							// Отмена выполнения
							case 9:
								$listServIn = '';
								$idPatient = $_GET['id'];
								$dataServ = $_GET['dataServ'];
								$idServ = $_GET['idServ'];
								$servQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPatient."'");
								$servArr = mysqli_fetch_assoc($servQuery);
								$listServ = $servArr['sp_uslug'];
								$servListArray = explode(',', $listServ);
								$count = count($servListArray);
								for ($i=0; $i < $count; $i++) {
									$exListServ = explode('-', $servListArray[$i]);
									$idServS = $exListServ[0];
									$dataS = $exListServ[4];
									if(($idServS == $idServ)&&($dataS == $dataServ))
										if($i == 0)
											$listServIn = $idServS.'-'.$exListServ[1].'-0-0-0-'.$exListServ[5];
										else
											$listServIn .= ','.$idServS.'-'.$exListServ[1].'-0-0-0-'.$exListServ[5];
									else
										if($i == 0)
											$listServIn = $idServS.'-'.$exListServ[1].'-'.$exListServ[2].'-'.$exListServ[3].'-'.$exListServ[4].'-'.$exListServ[5];
										else
											$listServIn .= ','.$idServS.'-'.$exListServ[1].'-'.$exListServ[2].'-'.$exListServ[3].'-'.$exListServ[4].'-'.$exListServ[5];
								}
								$updateServList = mysqli_query($connection, "UPDATE patient SET sp_uslug = '".$listServIn."' WHERE id = '".$idPatient."'");
								if($updateServList)
								{
									$_SESSION['link'] = "serv.php?id=".$idPatient;
									$DataBase -> route();
								}
								break;
							// Редактирование номера карты
							case 10:
								$searchId = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
								$idArr = mysqli_fetch_assoc($searchId);
								$cardNum = $idArr['numCard'];
								echo '
									<form action="edit.php">
										<label for="id">Введите новый номер карты<br><input name="idNew" type="text" value="'.$cardNum.'"></label>
										<input type="submit" name="submit" value="Изменить">
									</form>
								';
								break;
							//Отмена процедуры
							case 11:
								// id='.$idPacient.'&dataServ='.$dataServ.'&idServ='.$idServ.'
								// 2-1-1-1-22/11/2018 9:54-22/11/2018
								$listServIn = '';
								$idPatient = $_GET['id'];
								$dataServ = $_GET['date'];
								$idServ = $_GET['idServ'];
								$servQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPatient."'");
								$servArr = mysqli_fetch_assoc($servQuery);
								$listServ = $servArr['sp_uslug'];
								$servListArray = explode(',', $listServ);
								$count = count($servListArray);
								for ($i=0; $i < $count; $i++){

									$exListServ = explode('-', $servListArray[$i]);
									$idServS = $exListServ[0];
									$dataS = $exListServ[5];
									if(($idServS == $idServ)&&($dataS == $dataServ))
										{}
									else{
										if(($i == ($count-1))||($count == 2))
											$listServIn .= $idServS.'-'.$exListServ[1].'-'.$exListServ[2].'-'.$exListServ[3].'-'.$exListServ[4].'-'.$exListServ[5];
										else
											$listServIn .= $idServS.'-'.$exListServ[1].'-'.$exListServ[2].'-'.$exListServ[3].'-'.$exListServ[4].'-'.$exListServ[5].',';
									}
								}
								echo $listServIn;
								$updateServList = mysqli_query($connection, "UPDATE patient SET sp_uslug = '".$listServIn."' WHERE id = '".$idPatient."'");
								if($updateServList)
								{
									$_SESSION['link'] = "serv.php?id=".$idPatient;
									$DataBase -> route();
								}
								break;
							case 12:
								$idPatient = $_GET['id'];

								$patientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
								$patientArray = mysqli_fetch_assoc($patientQuery);
								$sumNow = $patientArray['sum'];
								$fioPatient = $patientArray['fio'];
								$typePatient = $patientArray['type'];

								$depositQuery = mysqli_query($connection, "SELECT * FROM deposit WHERE fio = '".$fioPatient."'");
								$depositArray = mysqli_fetch_assoc($depositQuery);
								$sumDeposit = $depositArray['sum'];
								$depositUpdate = mysqli_query($connection, "UPDATE deposit SET sum = '0' WHERE fio = '".$fioPatient."'");

								if($depositUpdate){
									$sumIn = $sumNow + $sumDeposit;
									$updatePatient = mysqli_query($connection, "UPDATE patient SET sum = '".$sumIn."' WHERE id = '".$id."'");
									if($updatePatient)
									{
										$createOper = mysqli_query($connection, "INSERT INTO operation(date, client, sum, type, typeSum) VALUES('".$date->getDateTime()."','".$fioPatient."','".$sumDeposit."','".$typePatient."','dep')");
										if(!$createOper)
											echo 'Ошибка создания операции';
										else
											header("Location:oper.php?id=".$id);
									}
									else
										echo 'Ошибка в обновление текущей суммы';
								}
								else
									echo 'Ошибка в обнулении депозита';

								break;
								case 13:
									$idPatient = $_GET['id'];
									$patQuery = mysqli_query($connection,"SELECT * FROM patient WHERE id=".$idPatient);
									$patArr = mysqli_fetch_assoc($patQuery);
									$curM = $patArr['currnet_mest'];
									
									echo '<form action="edit.php">
										<label for="id">Введите палату<br><input name="mestN" type="text" value="'.$curM.'"></label>
										<input type="submit" name="submit" value="Изменить">
									</form>';
							}
				 	?>
	     		</section>
	  		</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>