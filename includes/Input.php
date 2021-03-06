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
										case 'psi':
								    		echo '<td>Психолог</td>'; 
								    		break;
										case 'stpsi':
								    		echo '<td>Старший психолог</td>'; 
								    		break;
									    default:
									   		echo '<td>Тип не указан</td>'; 
									   		break;
									    } 
									echo '<td>'.$data['username'].'</td>'; 
									echo '<td>'.$data['password'].'</td>'; 
								    echo '<td>'.$data['value'].'</td>';
								    // Если врач вывести данные, если нет - пропуск
								    if(($data['dol'] == 'doc') || ($data['dol'] == 'ddoc') || ($data['dol'] == 'su') || ($data['dol']=='psi')||($data['dol']=='stpsi')){
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
				$listServP = array();
				$nameSrvArray = array();
							while($data = mysqli_fetch_assoc($result)) {
									$namePat = $data['fio'];
									$listServ = explode(',',$data['sp_uslug']);
									$countServ = count($listServ);
									$i = 0;
									
									while ($i < $countServ){
										$listServ[$i];
										if(!empty($listServ[$i])){
											$listServ[$i];
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
											$dateServ = "";
										if(!empty($dateServ)){
											$dateServEx = explode(' ', $dateServ);
											$dateEx = explode('/', $dateServEx[0]);
											$dateServPat = $dateEx[1];
											$month;

											if($dateServPat== $month){
													$listServP[] = array('name' => $servName,'fio' => $namePat, 'date' => $dateServ);
													$nameSrvArray[] = $servName;
											}
										}
									}

									$i++;
									}
								}
								$nameServ = array_unique($nameSrvArray);
								$countArray = count($listServP);
								$listNameServ = array();
								$idServList = array_keys($nameServ);
								$countAS = count($nameServ);	
								echo '<div class="listServ">';
								for ($j=0; $j < $countAS; $j++) { 
									echo '<h3>'.$nameServ[$idServList[$j]].'</h3>';
										echo '<ol>';
									for ($i=0; $i < $countArray; $i++) { 
										$servArrayNow = $listServP[$i];
										if($servArrayNow['name'] == $nameServ[$idServList[$j]])
											echo '<li><strong>Пациент: </strong>'.$servArrayNow['fio'].' <strong>Выполнено: </strong>'.$servArrayNow['date'].'</li>';
										}
									echo '</ol>';

									}

					if ($_GET['st'] == 1)
						echo '<a class="button" href="input.php?flaginput=2&st=0">Предыдущий месяц</a></div>';
					else
						echo '<a class="button" href="input.php?flaginput=2&st=1">Текущий месяц</a></div>';
				}
			}


		/* --- Индивидуальная таблица пациента --- */
		function getPacientPersonalTable($connection, $id, $date, $typeuser){
			$result = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
			unset($_SESSION['cost_serv']);
			unset($_SESSION['cost_mest']);

			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				while ($data = mysqli_fetch_assoc($result)){
					//Текущая дата
					$dateNow = $date->getDate();
					//Разбиение даты заселения на дату и время
					$dateIn = explode(' ', $data["dateIn"]);
					$_SESSION['frameid'] = $id;
					echo '
					<!--- Вывод сообщения о необходимости обновить страницу --->
					<div id="reload" style="display: none; width: 100%; background: red; color: white;text-align:center;"><strong>Обновите страницу</strong> <a href=javascript:history.go(0)>Обновить</a></div>	
						<div class="wrap-input">

							<!--- Имя и номер карты пациента --->
							<div class="name"><p>';
							if($data['type'] == 'Стационар')
							     echo '<a class="numcard" href="edit.php?flagedit=10&id='.$data['id'].'">#'.$data['numCard'].'</a> ';
							echo $data['fio'];
							if($typeuser == 'su')
								echo '<a href="del.php?id='.$data['id'].'&flagdel=5"><img width="5%" src="img/del.png" alt="Удалить"></a>';
							if($data['type'] == 'Стационар'){
								if(!empty($data['currnet_mest']))
									$curM = $data['currnet_mest'];
								else
									$curM = "Нет";
								echo'</p>
								<p>Палата: <a href="edit.php?flagedit=13&id='.$data['id'].'">'.$curM.'</a></p>';
							}
							echo '</div>

							<!--- Вывод даты рождения --->
							<div class="date"><p>Дата рождения: <br>'.$data['datebirthday'].'</p></div>';

							//Если есть телефон, то вывести его
							if (!empty($data['tel']))
							 echo '<div class="tel"><p>Телефон: <br>'.$data['tel'].'</p></div>';

							//Вывод даты записи и возможность ее изменения 
							echo '<div class="datest"><p>Дата записи: <br>'.$data['dateIn'].'</p>';
							if($typeuser == 'su')
							 echo '<br><a href="add.php?flagadd=11&id='.$id.'">Изменить</a>';
							echo'
							</div>      

							<!--- Установка даты выписки и ее отмена или изменение --->
							<div class="datefin"><p>Дата выписки: <br>';
								 if((empty($data['dateOut']))&&($_SESSION['typeUser']!='view')&&($_SESSION['typeUser']!='admin')&&($_SESSION['typeUser']!='ddoc'))
								 	echo '<a href="add.php?flagadd=8&id='.$id.'">Установить</a>';
								 else {
								 	echo $data['dateOut'];
								 	if($typeuser == 'su'){
								 		echo '<br><a href="add.php?flagadd=10&id='.$id.'">Изменить</a>';
								 		echo '<br><a href="add.php?flagadd=9&id='.$id.'">Отменить</a>';}
								 	}
							if(!empty($data['dateOut']))
								$countDayClinic = $date->getPeriod($data['dateIn'],$data['dateOut']);
							else
								$countDayClinic = $date->getPeriod($data['dateIn'],$date->getDateTime());
							echo '</p></div>

							<!--- Фрейм операции --->
							<div class="oper"><iframe id="oper"  width="100%" height="100%" src="oper.php?id='.$id.'" frameborder="1" seamless></iframe></div>

							<!--- Кнопки маркетологии --->
							<div class="butt"><iframe id="butt"  width="100%" height="100%" src="but.php?id='.$id.'" frameborder="1" seamless></iframe></div>

							<!--- Контактные данные --->
							<div class="inf"><iframe id="inf"  width="100%" height="100%" src="inf.php?id='.$id.'" frameborder="1" seamless></iframe></div>';

							//Фейм койко -мест
							if($data['type'] == 'Стационар')
							 	echo '<div class="mest"><iframe id = "mest" seamless width="100%" height="100%" src="mest.php?id='.$id.'" frameborder="1"></iframe></div>';
							else{
							 	isset($_SESSION['sum_mest']);
							 	    echo '<script>menuSt.style.display = "none";
							 	        menuAm.style.display = "flex";</script>';
								}

							//Фрейм услуг
							echo '<div class="serv"><iframe id="serv" width="100%" height="100%" src="serv.php?id='.$id.'" frameborder="1"></iframe></div>';

							//Подсчет дней в стационаре
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
												$allday += $countD;
												$i++;
												}
									$sum_mest = $allsum;
									$_SESSION['cost_mest'] = $allsum;
								}

								}
							if(!isset($allday))
								$allday = 0;
							//Подсчет суммы 
							$patQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
							$namePat = mysqli_fetch_assoc($patQuery);
							$serv = $namePat['sp_uslug'];
							$sumall = 0;
							$listServ = explode(',', $serv);
							$countServ = count($listServ);
							$i = $allsum = $sumNow = 0;

							while ($i < $countServ){
								$exListServ = explode('-', $listServ[$i]);
								$idServ = $exListServ[0];
								if(isset($exListServ[3]))
									$statusServ = $exListServ[3];
								else
									$statusServ = 0;
								$queryderv = mysqli_query($connection, "SELECT * FROM items WHERE id= '".$idServ."'");
								$dataserv = mysqli_fetch_assoc($queryderv);
								if(isset($exListServ[6]))
									$costServ = $exListServ[6];
								else
									$costServ = $dataserv['cost'];
								if($statusServ == 1)
									$sumNow += $costServ;
								$i++;
							}
								
							
							if(isset($sum_mest))
							 	$sumF = $sumNow + $sum_mest;
							else
							 	$sumF = $sumNow;
							
							$sumallPat = 0;
							$result = mysqli_query($connection, "SELECT * FROM operation WHERE idPat = '".$data['id']."'");
							if(mysqli_num_rows($result) == 0)
								$result = mysqli_query($connection, "SELECT * FROM operation WHERE client = '".$data['fio']."'");
							while($dataSum = mysqli_fetch_assoc($result))
							{
								$sumallPat += $dataSum['sum'];
							}

							// Кнопка закрытия карты
							// if($data['status'] == 0)
							 	// echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Карта <br> закрыта</p></div>';
							// else{ 
									// if($sumF != $sumallPat)
							 			// echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Проверьте<br>Сумму</p></div>';
							 		// elseif(empty($data['dateOut']))
							 			// echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Дата<br>выписки</p></div>';
							 		// elseif($_SESSION['typeUser']=='view' || $_SESSION['typeUser']=='admin' || $_SESSION['typeUser']=='ddoc')
							 			// echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Нет<br>Прав</p></div>';
							 		// elseif(empty($data['ad']))
							 			// echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Нет<br>Рекламы</p></div>';
							 		// elseif(empty($data['dispecher']))
							 			// echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Нет<br>Диспетчера</p></div>';
							 		// elseif($allday != $countDayClinic){
							 			// if($data['type'] == 'Стационар')
							 				// echo '<div class="btn-cl"><p style="border-top:3px red solid ;">Проверьте<br>койко - дни</p></div>';
							 			// }
									// else
							 			// echo '<div class="btn-cl"><a style="border-top:3px green solid ;" href="edit.php?flagedit=8&id='.$id.'">Закрыть<br>карту</a></div>';
								// }

							//Фрейм комментария
							$patientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
							$patArr = mysqli_fetch_assoc($patientQuery);
							$comment = $patArr['comment'];
							echo '<div class="comment">';
							if(empty($comment))
								echo '<a target="_blank" href="input.php?flaginput=16&id='.$id.'"><img width="30%" src="img/comment.png" id="comment" alt="Комментарий отсутствует"></a>';
							else
								echo '<a target="_blank" href="input.php?flaginput=16&id='.$id.'"><img width="30%" src="img/comment-active.png" data-name="Новое сообщение" id="comment" alt="Новое сообщение" title="Новое сообщение"></a>';
							echo '</div>';

							//Кнопка стоимости
							$sumDol = $sumF  - $sumallPat;
							if($data['status'] == 0) {
                                echo '<div class="btn-cost"><p style="border-top:3px red solid ;">Карта <br> закрыта</p></div>';
                            }
							elseif ($sumF  != $sumallPat)
							 	// echo '<div class="btn-cost" style="border:10px green solid ;"><p>Оплата</p></div>';
								echo "
								<style>
									.wrap-input .oper {
										border: red 2px solid;
								</style>
								";
							elseif(empty($data['dateOut']))
							 	// echo '<div class="btn-cost"><p style="border-top:3px red solid ;">Дата<br>выписки</p></div>';
								echo "
								<style>
									.wrap-input .datefin {
										border: red 2px solid;
								</style>
								";
							elseif($_SESSION['typeUser']=='view' || $_SESSION['typeUser']=='admin' || $_SESSION['typeUser']=='ddoc')
							 	// echo '<div class="btn-cost"><p style="border-top:3px red solid ;">Нет<br>Прав</p></div>';
								echo "
								<style>
									.wrap-input{
										border: red 2px solid;
								</style>
								";
							elseif(empty($data['ad']))
							 	// echo '<div class="btn-cost"><p style="border-top:3px red solid ;">Нет<br>Рекламы</p></div>';
								echo "
								<style>
									.wrap-input .butt {
										border: red 2px solid;
								</style>
								";
							 elseif(empty($data['dispecher']))
							 	// echo '<div class="btn-cost"><p style="border-top:3px red solid ;">Нет<br>Диспетчера</p></div>';
								echo '
								<style>
									.wrap-input .butt {
										border: red 2px solid;
								</style>
								';
							elseif($allday != $countDayClinic){
							 	if($data['type'] == 'Стационар')
							 		// echo '<div class="btn-cost"><p style="border-top:3px red solid ;">Проверьте<br>койко - дни</p></div>';
								echo "
								<style>
									.wrap-input .mest {
										border: red 2px solid;
								</style>
								";
							}
							else if($_SESSION['typeUser'] !== 'su') {
                                echo '<div class="btn-cost"><a style="border-top:3px green solid ;" href="edit.php?flagedit=8&id=' . $id . '">Закрыть<br>карту</a></div>';
                            }

							//Вывод лечащего врача
							 if(($data['doctor']=='')&&($_SESSION['typeUser']!='ddoc')&&($_SESSION['typeUser']!='admin')&&($_SESSION['typeUser']!='view'))
							 	echo '<div class="doc">Лечащий доктор: <a href="edit.php?flagedit=4&id='.$id.'">Стать</a></div>';
							 else
								echo '
									<div class="doc">Лечащий доктор: '.$data['doctor'];
									if($typeuser == 'su')
										echo '<a href="del.php?id='.$data['id'].'&flagdel=6"><img width="2%" src="img/del.png" alt="Удалить"></a>';
									echo '</div>';
						echo'
						</div>

						<!--- Обновление фреймов --->
						<script>
							var lo = document.getElementById(\'oper\');
							setInterval(function() {lo.src = \'oper.php?id='.$_SESSION['frameid'].'\';}, 90000);
							var serv = document.getElementById(\'serv\');
							setInterval(function() {serv.src = \'serv.php?id='.$_SESSION['frameid'].'\';}, 90000);
							var mest = document.getElementById(\'mest\');
							setInterval(function() {mest.src = \'mest.php?id='.$_SESSION['frameid'].'\';}, 90000);
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