<?php
	/* --- Класс вывода информации из БД --- */
	class Input{
		public $date;

		/* --- Получение объекта времени --- */
		function __construct($date){
			$this->date = $date;
			}

		/* --- Вывод таблицы персонала --- */
 		function getPersonalTable($connection){
			$result = mysqli_query($connection, "SELECT * FROM usertbl");

			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				echo'
					<table >
						<caption>Список Персонала</caption>
						<thead>
							<tr>
							    <th rowspan="2" class="first">#</th>
							    <th rowspan="2">ФИО</th>
							    <th rowspan="2">Тип Записи</th>
							    <th rowspan="2">Логин</th>
							    <th rowspan="2">Пароль</th>
							    <th rowspan="2">Процентная ставка</th>
							    <th colspan="2">Зарплата в месяц</th>
							    <th colspan="2">Услуг в месяц</th>
							    <th rowspan="2">Изменить</th>
							    <th rowspan="2">Удалить</th>
							</tr>
							<tr>
							    <td class="first">Прошлый</td>
							    <td class="first">Текущий</td>
							    <td class="first">Прошлый</td>
							    <td class="first">Текущий</td>
							</tr>
						</thead>
						<tbody>';
							while($data = mysqli_fetch_assoc($result)) {
								echo '<tr>';
									echo '<td>'.$data['id'].'</td>';
									echo '<td>'.$data['fio'].'</td>';
									// Вывод должности в удобочитаемом виде
									switch ($data['dol']){
									    case 'doc':
									    	echo '<td>Доктор</td>'; 
									    	break;
									    case 'ddoc':
									    	echo '<td>Дежурный доктор</td>';
									    	break;
									    case 'admin':
									   		echo '<td>Администратор</td>'; 
									   		break;
									  	case 'view':
								    		echo '<td>Наблюдатель</td>'; 
								    		break;
								    	case 'su':
								    		echo '<td>Супер Пользователь</td>'; 
								    		break;
									    default:
									   		echo '<td>Тип не указан</td>'; 
									   		break;
									    } 
									echo '<td>'.$data['username'].'</td>'; 
									echo '<td>'.$data['password'].'</td>'; 
								    echo '<td>'.$data['value'].'</td>';
								    // Если врач вывести данные, если нет - пропуск
								    if(($data['dol'] == 'doc') || ($data['dol'] == 'ddoc')){
										echo '<td>'.$data['money_prevMonth'].'</td>';
										echo '<td>'.$data['money'].'</td>';
									    echo '<td>'.$data['uslugi_prevMonth'].'</td>';
									    echo '<td>'.$data['uslugi'].'</td>';
										}
									else{
										echo '<td>----</td>';
									    echo '<td>----</td>';
									    echo '<td>----</td>';
									    echo '<td>----</td>';
										}
									echo '<td><a href="edit.php?flagedit=1&id='.$data['id'].'"><img class = "icon" src="img/edit.png" alt="Изменить"></a></td>';
								    echo '<td><a href="del.php?id='.$data['id'].'&flagdel=1"><img class = "icon_big" src="img/del.png" alt="Удалить"></a></td>';
							    echo '</tr>';
								    }
	 					echo '</tbody>
					</table>';	}	
			}

		/* --- Вывод таблицы Услуг --- */
		function getItemsTable($connection){
			$result = mysqli_query($connection, "SELECT * FROM items");

			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				echo'
					<table>
						<caption>Список Услуг</caption>
						<thead>
							<tr>
							    <th rowspan="2" class="first">#</th>
							    <th rowspan="2">Название</th>
							    <th rowspan="2">Стоимость</th>
							    <th rowspan="2">Описание</th>
							    <th rowspan="2">Бонусы за предоставлени</th>
							    <th rowspan="2">Бонусы за назначение</th>
							    <th rowspan="2">Изменить</th>
							    <th rowspan="2">Удалить</th>
							 </tr>
						</thead>
						<tbody>';
							while($data = mysqli_fetch_assoc($result)){
									echo '<tr>';
								    echo '<td>'.$data['id'].'</td>';
								    echo '<td>'.$data['name'].'</td>';
								    if ($data['cost'] == 0)
								    	echo '<td>Бесплатно</td>';										
								    elseif ($data['cost'] == 1)
										echo '<td>Ручной режим</td>';
								    else
								    	echo '<td>'.$data['cost'].'</td>';
								    if(!empty($data['dist'])) 
								    	echo '<td>'.$data['dist'].'</td>';
								    else 
								    	echo '<td style="color:grey;">Нет описания</td>'; 
								    echo '<td>'.$data['bonus'].'</td>';
								    echo '<td>'.$data['bonusN'].'</td>';
								    echo '<td><a href="edit.php?id='.$data['id'].'&flagedit=2"><img class = "icon" src="img/editit.png" alt="Изменить"></a></td>';
								    echo '<td><a href="del.php?id='.$data['id'].'&flagdel=2"><img class = "icon_big" src="img/del.png" alt="Удалить"></a></td>';
								    echo '</tr>';
								    }
	 					echo '</tbody>
					</table>';	
				}	
			}

		/* --- Назначения пациенту --- */
		function getServTable($connection, $type){
			if ($_GET['st'] == 1)
				$month = date("m");
			else{
				$month = date("m") - 1;
				if ($month == 0)
					$month = 1;
				}
			
			$result = mysqli_query($connection, "SELECT * FROM `patient`");
			$doctor = mysqli_query($connection, "SELECT * FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
			$dataDOC = mysqli_fetch_assoc($doctor);
			$idDoctor = $dataDOC['id'];

			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				echo'
					<table align="center">
						<thead>
							<tr>
							    <th rowspan="2">ФИО пациент</th>
							    <th rowspan="2">Услуга</th>
							    <th rowspan="2">Дата выполнения</th>
							    <th rowspan="2">Статус</th>
							</tr>
						</thead>
						<tbody>';
							while($data = mysqli_fetch_assoc($result)) {
								echo '<tr>';
									$namePat = $data['fio'];
									$listServ = explode(',',$data['sp_uslug']);
									$countServ = count($listServ);
									$i = 0;
									while ($i < $countServ){
										$exListServ = explode('-', $listServ[$i]);
										$idServ = $exListServ[0];
										$serv = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$idServ."'");
										$dataserv = mysqli_fetch_assoc($serv);
										$servName = $dataserv['name'];
										$idDoc = $exListServ[2];
										$stServ = $exListServ[3];
										if ($stServ == 1)
											$dateServ = $exListServ[4];
										else
											$dateServ = '---';
										if($idDoc == $idDoctor)
											if($stServ == 1){
												$dateTime = explode(' ', $dateServ);
												$dateService = explode('/', $dateTime[0]);
												$monthServ = $dateService[1];
												if($monthServ == $month){
													echo '<td>'.$namePat.'</td>';
													echo '<td>'.$servName.'</td>';
													echo '<td>'.$dateServ.'</td>';
													echo '<td>Выполнено</td>';
													echo '</tr>';
													}
												}
											elseif($stServ == 0){
												echo '<td>'.$namePat.'</td>';
												echo '<td>'.$servName.'</td>';
												echo '<td>'.$dateServ.'</td>';
												echo '<td>Не выполнено</td>';
												echo '</tr>';
												}
										$i++;
										}
								echo '</tr>';
								}
	 					echo '</tbody>
					</table>';
					if ($_GET['st'] == 1)
						echo '<a class="button" href="input.php?flaginput=2&st=0">Предыдущий месяц</a>';
					else
						echo '<a class="button" href="input.php?flaginput=2&st=1">Текущий месяц</a>';
				}
			}

		/* --- Индивидуальная таблица пациента --- */
		function getPacientPersonalTable($connection, $id, $date, $typeuser){
			$result = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");

			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				while ($data = mysqli_fetch_assoc($result)){
					//Текущая дата
					$dateNow = $date->getDate();
					//Разбиение даты заселения на дату и время
					$dateIn = explode(' ', $data["dateIn"]);
					//Количество дней в стационаре
					$counDay = $date->getPeriod($dateIn[0]) + 1;
					//Получение стоимости койко - места
					$costMestQuery = mysqli_query($connection, "SELECT * FROM mest WHERE id = '".$data['mest']."'");
					$costMestArr = mysqli_fetch_assoc($costMestQuery);
					$costMest = $costMestArr['value'];
					//Стоимость проживания
					$costDay = $counDay * $costMest;
					$_SESSION['frameid'] = $id;
					//Сумма к оплате
					$compSum = $data["sumNow"] + $costDay;
					//Разнича между внесенными деньгами и суммы к оплате
					$transferSum = $compSum - $data["sum"];
					unset($_SESSION['sum_mest']);
					echo '	
					<div id="reload" style="display: none; width: 100%; background: red; color: white;text-align:center;"><strong>Обновите страницу</strong> <a href=javascript:history.go(0)>Обновить</a></div>	
						<div class="wrap-input">
							<div class="name"><p>'.$data['fio'].'</p></div>
							<div class="date"><p>Дата рождения: <br>'.$data['datebirthday'].'</p></div>';
							if (!empty($data['tel']))
							 echo '<div class="tel"><p>Телефон: <br>'.$data['tel'].'</p></div>';
							echo '<div class="datest"> <p>Дата записи: <br>'.$data['dateIn'].'</p></div>      
							<div class="datefin"><p>Дата выписки: <br>';
								 if((empty($data['dateOut']))&&($_SESSION['typeUser']!='view'))
								 	echo '<a href="add.php?flagadd=8&id='.$id.'">Установить</a>';
								 else {
								 	echo $data['dateOut'];
								 	if($typeuser == 'su')
								 		echo '<br><a href="add.php?flagadd=9&id='.$id.'">Отменить</a>';
								 	}
							echo '</p></div>
							<div class="oper"><iframe id="oper"  width="100%" height="100%" src="oper.php?id='.$id.'" frameborder="1" seamless></iframe></div>
							<div class="butt"><iframe id="butt"  width="100%" height="100%" src="but.php?id='.$id.'" frameborder="1" seamless></iframe></div>
							<div class="inf"><iframe id="inf"  width="100%" height="100%" src="inf.php?id='.$id.'" frameborder="1" seamless></iframe></div>';
							if($data['type'] == 'Стационар')
							 	echo '<div class="mest"><iframe id = "mest" seamless width="100%" height="100%" src="mest.php?id='.$id.'" frameborder="1"></iframe></div>';
							else{
							 	isset($_SESSION['sum_mest']);
							 	    echo '<script>menuSt.style.display = "none";
							 	        menuAm.style.display = "flex";</script>';
								}
							echo '<div class="serv"><iframe id="serv" width="100%" height="100%" src="serv.php?id='.$id.'" frameborder="1"></iframe></div>';
							if ($data['type'] == 'Стационар'){
								$allsum = $allday = 0;
								if(!empty($data['mest'])){
									$listMest = explode(',', $data['mest']);
									$countDay = count($listMest);
									$i = 0;
										while ($i<$countDay){
												$expMest= explode('-', $listMest[$i]);
												$idM = $expMest[0];
												$countD = $expMest[1];
												$mestQuery =mysqli_query($connection, "SELECT * FROM mest WHERE id = '".$idM."'");
												$mestArr = mysqli_fetch_assoc($mestQuery);
												$costMest = $mestArr['value'];
												$allsum += $costMest*$countD;
												$i++;
												}
									$_SESSION['sum_mest'] = $allsum;
								}

								}
							if(isset($_SESSION['cost_serv']))
								$sumNow = $_SESSION['cost_serv'];
							if(isset($_SESSION['sum_mest']))
							 	$sumF = $sumNow + $_SESSION['sum_mest'];
							else
							 	$sumF = $sumNow;
							if($data['status'] == 0)
							 	echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Карта <br> закрыта</p></div>';
							elseif (($sumF == $data['sum']) and (!empty($data['dateOut'])) &&($_SESSION['typeUser']!='view'))
								echo '<div class="btn-cl"><a style="border-top:3px green solid ;" href="edit.php?flagedit=8&id='.$id.'">Закрыть<br>карту</a></div>';
							else
							 	echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Закрыть<br>карту</p></div>';
							$sumDol = $sumF  - $data['sum'];
							if ($sumF  == $data['sum'])
							 	echo '<div class="btn-cost" style="border:10px green solid ;"><p>Оплата</p></div>';
							else
							 	echo '<div class="btn-cost" style="border:10px red solid ;"><p>'.$sumDol.'</p></div>';
							echo '
							<div class="doc">Лечащий доктор: '.$data['doctor'].'</div>
						</div>
						<script>
							var lo = document.getElementById(\'oper\');
							setInterval(function() {lo.src = \'oper.php?id='.$_SESSION['frameid'].'\';}, 10000);
							var serv = document.getElementById(\'serv\');
							setInterval(function() {serv.src = \'serv.php?id='.$_SESSION['frameid'].'\';}, 10000);
							var mest = document.getElementById(\'mest\');
							setInterval(function() {mest.src = \'mest.php?id='.$_SESSION['frameid'].'\';}, 10000);
							var inf = document.getElementById(\'inf\');
							setInterval(function() {inf.src = \'inf.php?id='.$_SESSION['frameid'].'\';}, 5000);
							var but = document.getElementById(\'butt\');
							setInterval(function() {but.src = \'but.php?id='.$_SESSION['frameid'].'\';}, 5000);
							var reload = document.getElementById(\'reload\');
							setInterval(function() {reload.style.display = "block";}, 180000);
						</script>
						';
					}
				}
			}

		/* --- Вывод койко - мест --- */
		public function getTablesMest($connection){
			//Запросы для вывода таблиц койко мест
			$mestQuery = mysqli_query($connection, "SELECT * FROM mest");
			$countMest = mysqli_num_rows($mestQuery);

			if ($countMest == 0)
				echo "<h1>Добавьте койко - место</h1>";
			else{
				echo '<h1>Список койко мест</h1>';
				echo'<table>';
					echo '<tr>
						<td>Тип койко места</td>
						<td>Стоимость одного дня проживания</td>
						<td>Редактировать</td>
						<td>Удалить</td>	
					</tr>';
						while($dataDB = mysqli_fetch_assoc($mestQuery)){
							echo '<tr>';
							echo '<td>'.$dataDB['status'].'</td>
								  <td>'.$dataDB['value'].'</td>
								  <td><a style = "color: white; font-size: 14px;"href="edit.php?flagedit=6&id='.$dataDB['id'].'"><img class="icon" src="img/editit.png" alt="Edit"></a></td>
								  <td><a style = "color: white; font-size: 14px;"href="del.php?flagdel=3&id='.$dataDB['id'].'"><img class="icon" src="img/del.png" alt="Delete"></a></td>';
							echo '</tr>';
							}
				echo '</table>';
				}
			echo '<a href="add.php?flagadd=7" class = "button">Добавить койко - место</a>';
			}

		/* --- Панель добавления пациента --- */
		public function getAddPatient($connection){
			echo '
				<h1>Выберите тип лечения</h1>
				<div class="wrapp">
					<a href="add.php?flagadd=5&stac=0">
						<div class="btnBig1"><img class="icon" src="img/am.png" alt=""><p>Амбулатория</p></div>
					</a>
					<a href="add.php?flagadd=5&stac=1">
						<div class="btnBig2"><img class="icon" src="img/st.png" alt=""><p>Стационар</p></div>
					</a>
				</div>';	
			}

		/* --- Панель добавления операции --- */
		public function getAddOperation($connection, $dateNow){
			echo '
				<div class="wrap">
					<h1>Выберите где пациент лечится</h1>
					<div class="btn-gr"> 
					    <a href="add.php?flagadd=6&stac=0">
						    <div class="btn-left">
					          <img src="img/am.png" alt="">
					          <p>Амбулатория</p>
					        </div>
				        </a>
				        <a href="add.php?flagadd=6&stac=1">
				        	<div class="btn-right">
					          <img src="img/st.png" alt="">
					          <p>Стационар</p>
					        </div>
					    </a>
					</div>
					<div class="stat">
				        <h1>Статистика за сегодня</h1>';
		    	        $sumAll =  $sumNal = $sumBN = $sumA = $sumS = 0;
					    $sum = mysqli_query($connection, 'SELECT * FROM operation WHERE date LIKE "'.$dateNow.'%"');
					    if(mysqli_num_rows($sum) == 0)
					        echo "<p align='center'>Нет операций за текущий период</p>";
					    else {
					        while($data = mysqli_fetch_assoc($sum)){
					            $sumAll = $sumAll + (integer)$data['sum'];
					            if ($data['typeSum'] == 'nal')
					                $sumNal = $sumNal + (integer)$data['sum'];
					            elseif ($data['typeSum'] == 'beznal')
					                $sumBN = $sumBN + (integer)$data['sum'];
					            if ($data['type'] == 'Амбулатория')
					                $sumA = $sumA + (integer)$data['sum'];
					            elseif ($data['type'] == 'Стационар')
					                $sumS = $sumS + (integer)$data['sum'];
					            }               
					        echo "<p align='center'>Общая сумма операций: ".$sumAll." </p>";
					        echo "<p style='float:left;'>Наличными: ".$sumNal." </p>";
					        echo "<p style='float:right;'>Безналичными: ".$sumBN." </p><br>";
					        echo "<p style='margin-top: 3px;position: fixed; float:left;'>Амбулатория: ".$sumA." </p>";
					        echo "<p style='margin-top: 3px;position: fixed; right: 0;'>Стационар: ".$sumS." </p>";
					        }
					    echo'
					</div>
				</div>';
			}

		/* --- Вывод параметров --- */
		function getParam(){
			echo '
				<div class="wrap-btn">
					<div class="gr-top">
					    <div class="btn-top-left"><a href="param.php"><p>Основные параметры</p></a></div>
					    <div class="btn-top-right"><a href="input.php?flaginput=10"><p>Списки и Статистика</p></a></div>
					</div>					  
					<div class="gr-mid">
					    <div class="btn-mid"><a href="input.php?flaginput=6"><p>Койко-места</p></a></div>
					</div>
					<div class="gr-btm">
					    <div class="btn-btm-left"><a href="input.php?flaginput=1"><p>Пользователи</p></a></div>
					    <div class="btn-btm-right"><a href="input.php?flaginput=4"><p>Услуги</p></a></div>
					</div>					  
				</div>';
			}

		/* --- Панель кнопок --- */
		function getBtn(){
			echo '
				<div class="wrap-btn-10">
					<div class="gr-top">
					    <div class="btn-top-right"><a href="input.php?flaginput=11&set=0"><p>Список пациентов</p></a></div>
					</div> 
					<div class="gr-mid">
					    <div class="btn-mid"><a href="input.php?flaginput=12&set=0"><p>Список операций</p></a></div>
					</div>
					<div class="gr-btm">
					    <div class="btn-btm-left"><a href="stat.php"><p>Статистика</p></a></div>
					</div>					  
				</div>';
			}

		/* --- Вывод пациентов --- */
		function inPat($connection, $set){
			if($set == 0)
				$result = mysqli_query($connection, "SELECT * FROM `patient` ORDER BY id DESC LIMIT 30");
			else
				$result = mysqli_query($connection, "SELECT * FROM `patient` ORDER BY id DESC");


			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				echo'
				<table>';
					echo '<thead>
						<tr>
							<th rowspan="2">#</th>
						    <th rowspan="2">ФИО</th>
						    <th rowspan="2">Дата рождения</th>
						    <th rowspan="2">Телефон</th>
						    <th rowspan="2">Услуги</th>
						    <th rowspan="2">Стоимость</th>
						    <th rowspan="2">Лечащий доктор</th>
						    <th rowspan="2">Внесенная сумма</th>
						    <th rowspan="2">Заметки</th>
						    <th rowspan="2">Дата поступления</th>';
						    echo'<th rowspan="2">Койко место</th>';
						   	echo'<th rowspan="2">Тип</th>
						   	<th rowspan="2">Карта открыта</th>
						</tr>
					</thead>
					<tbody>';
						while($data = mysqli_fetch_assoc($result)) {
							echo '<tr>';
								echo '<td>'.$data['id'].'</td>'; 
							    echo '<td>'.$data['fio'].'</td>'; 
							    echo '<td>'.$data['datebirthday'].'</td>'; 
							    echo '<td>'.$data['tel'].'</td>'; 
							    echo '<td><a href="edit.php?id='.$data['id'].'&flagedit=3"><img class = "icon" src="img/list.png" alt="Посмотреть"></a></td>';
							    echo '<td>'.$data['all_sum'].'</td>';
							    if  ($data['doctor'] == 'no')
							    	echo '<td style = "background: rgba(200,10,10,0.3);">Доктор не назначен</td>';
							    else
							    	echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['doctor'].'</td>';
							    if  (empty($data['sum']))
							    	echo '<td style = "background: rgba(200,10,10,0.3);">Сумма не внесена</td>';
							    else
							    	echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['sum'].'</td>';
							    if  (empty($data['dist']))
							    	echo '<td style = "background: rgba(200,10,10,0.3);">Заметок нет</td>';
							    else
							   		echo '<td>'.$data['dist'].'</td>';
							    echo '<td>'.$data['dateIn'].'</td>';
							    if($data['mest'] == 'NULL')
							    	echo '<td>Амбулатория</td>';
							    else
							    	echo '<td>'.$data['mest'].'</td>'; 
							   	echo '<td>'.$data['type'].'</td>';
							   	if($data['status'] == '1')
							    	echo '<td style = "background: rgba(10,200,10,0.3);">ДА</td>';
							    else
							    	echo '<td style = "background: rgba(200,10,10,0.3);">НЕТ</td>'; 
						    echo '</tr>';
						}
	 				echo '</tbody>
				</table>';
				if($set == 0)
					echo '<a class="button" href="http://localhost/doc/input.php?flaginput=11&set=1">Вывести всех пациентов</a>';
					
				}
			}

		/* --- Вывод операций --- */
		function inOp($connection, $set){	
			if ($set == 0) {
				$result = mysqli_query($connection, "SELECT * FROM operation ORDER BY id DESC LIMIT 20");
				// Переход к готовому методу
				$this-> getOperationTable($connection, $result);
				echo '<a class="button" href="http://localhost/doc/input.php?flaginput=12&set=1">Вывести все операции</a>';
				}
			else{
				$result = mysqli_query($connection, "SELECT * FROM operation ORDER BY id DESC");
				$this-> getOperationTable($connection, $result);
				}	
			}

		/* --- Таблица операций --- */
		function getOperationTable($connection, $result){
			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				echo'<table align="center">
					<caption>Список денежных операций</caption>
					<thead>
							<tr>
							    <th rowspan="2" class="first">#</th>
							    <th rowspan="2">Клиент</th>
							    <th rowspan="2">Сумма</th>
							    <th rowspan="2">Тип платежа</th>
							    <th rowspan="2">Тип лечения</th>
							    <th rowspan="2">Дата</th>
							</tr>
					</thead>
					<tbody>';
						while($data = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							    echo '<td>'.$data['id'].'</td>';
							    echo '<td>'.$data['client'].'</td>';
							    if ($data['sum'] < 0)
							    	echo '<td style = "background: rgba(200,10,10,0.3);">'.$data['sum'].'</td>';
							    else
							    	echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['sum'].'</td>';
							    if ($data['typeSum']=='nal')
							    	echo '<td>Наличный</td>'; 
							    else
							    	echo '<td>Безналичный</td>';
							    echo '<td>'.$data['type'].'</td>'; 
							    echo '<td>'.$data['date'].'</td>'; 
							echo '</tr>';
							}
	 				echo '</tbody>
				</table>';	}	
			}
		} 
		
	include 'Date.php';
	$input = new Input($date);
?>