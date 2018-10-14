<?php
	class Input{
		public $date;

		function __construct($date){
			$this->date = $date;
		}

 		function getPersonalTable($connection)
			{
				$result = mysqli_query($connection, "SELECT * FROM usertbl");

				if (mysqli_num_rows($result) == 0)
					echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
				else{
				echo'
					<table>
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
								    switch ($data['dol'])
								    {
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
								    if(($data['dol'] == 'doc') || ($data['dol'] == 'ddoc')) 
								    {
									    echo '<td>'.$data['money_prevMonth'].'</td>';
									    echo '<td>'.$data['money'].'</td>';
									    echo '<td>'.$data['uslugi_prevMonth'].'</td>';
									    echo '<td>'.$data['uslugi'].'</td>';
									}
									else
									{
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

		function getItemsTable($connection)
			{
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
						    <th rowspan="2">Бонусы за предоставления</th>
						    <th rowspan="2">Изменить</th>
						    <th rowspan="2">Удалить</th>
						  </tr>
						</thead>
						<tbody>';
								while($data = mysqli_fetch_assoc($result)) {
									echo '<tr>';
								    echo '<td>'.$data['id'].'</td>';
								    echo '<td>'.$data['name'].'</td>'; 
								    echo '<td>'.$data['cost'].'</td>'; 
								    echo '<td>'.$data['dist'].'</td>'; 
								    echo '<td>'.$data['bonus'].'</td>'; 
								    echo '<td><a href="edit.php?id='.$data['id'].'&flagedit=2"><img class = "icon" src="img/editit.png" alt="Изменить"></a></td>';
								    echo '<td><a href="del.php?id='.$data['id'].'&flagdel=2"><img class = "icon_big" src="img/del.png" alt="Удалить"></a></td>';
								    echo '</tr>';
								    }
	 					echo '</tbody>
					</table>';	}	
			}

		function getPacientTable($connection, $type)
			{
				if ($_SESSION['typeUser'] == 'doc')
				{
					$doctor = mysqli_query($connection, "SELECT fio FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
					$data = mysqli_fetch_assoc($doctor);
					$result = mysqli_query($connection,"SELECT * FROM patient WHERE type = 'Амбулатория' AND status = '1' AND (doctor = '".$data['fio']."' OR doctor = 'no')");
				}
				else
					$result = mysqli_query($connection, "SELECT * FROM `patient` WHERE type = 'Амбулатория' AND  status = 1 ORDER BY id DESC");



				if (mysqli_num_rows($result) == 0)
					echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
				else{
				echo'
					<table>';
					if ($type == 0) 
						echo '<caption>Пациенты в амбулатории</caption>';
					else
						echo '<caption>Пациенты в стационаре</caption>';
					echo '
						<thead>
						<tr>
						    <th rowspan="2">ФИО</th>
						    <th rowspan="2">Дата рождения</th>
						    <th rowspan="2">Телефон</th>
						    <th rowspan="2">Услуги</th>
						    <th rowspan="2">Стоимость</th>
						    <th rowspan="2">Лечащий доктор</th>
						    <th rowspan="2">Внесенная сумма</th>
						    <th rowspan="2">Заметки</th>
						    <th rowspan="2">Дата поступления</th>';
						    if ($type == 1)
						    	echo'<th rowspan="2">Койко место</th>';
						   	echo'<th rowspan="2">Парметр</th>
						  </tr>
						</thead>
						<tbody>';
								while($data = mysqli_fetch_assoc($result)) {
									echo '<tr>';
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
								    if ($type == 1)
								    	echo '<td>'.$data['mest'].'</td>'; 
								    echo '<td>';
								    if ($_SESSION['typeUser'] == 'doc')
								    	if ($data['doctor']=='no')
								    		echo '<a style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=4">Стать лечащим врачем</a>';
								    	else
								    		echo '<p>Параметров нет</p>';
								    elseif ($_SESSION['typeUser'] == 'admin')
								    {
								    	$transferSum = $data["sumNow"] - $data["sum"];
								    	if($data["sum"] < $data["sumNow"])
								    		echo "<a href='add.php?flagadd=6&stac=1&sum=".$transferSum."&id=".$data['id']."&flagop=1'>Внести сумму (".$transferSum." руб.)</a>";
								    	if($data["sum"] > $data["sumNow"])
								    		echo "<a href='add.php?flagadd=6&stac=1&sum=".$transferSum."&id=".$data['id']."&flagop=1'>Вернуть деньги (".abs($transferSum)." руб.)</a>";
								    	if($data["sum"] == $data["sumNow"])
								    		echo "<a href='edit.php?flagedit=8&id=".$data['id']."'>Выписать</a>";
								    }
								    elseif ($_SESSION['typeUser'] == 'su')
								    	echo '<a style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=7&stat=0">Редактировать</a>';
								    echo '</td>';
								    echo '</tr>';
								    }
	 					echo '</tbody>
					</table>';
					if (mysqli_num_rows($result) == 1)
						echo '<p align="center" style = "color: black; margin: 10px;">В данный момент лечится '.mysqli_num_rows($result).' пациент</p>'; 
					elseif ((mysqli_num_rows($result) == 2) or (mysqli_num_rows($result) == 3) or (mysqli_num_rows($result) == 4))	
						echo '<p align="center" style = "color: black; margin: 10px;">В данный момент лечaтся '.mysqli_num_rows($result).' пациента</p>';
					else
						echo '<p align="center" style = "color: black; margin: 10px;">В данный момент лечaтся '.mysqli_num_rows($result).' пациентов</p>';
				}
			}

		function getPacientPersonalTable($connection, $id, $date)
			{
				$result = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");

				if (mysqli_num_rows($result) == 0)
					echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
				else{
					while ($data = mysqli_fetch_assoc($result))
					{
						echo '<div class="wrap-inf">';
						echo "<h1 align='center'>".$data['fio']."</h1>";
						if ($data['status'] == '0')
							echo "<h1 align='center' style = 'color:red;'>Выписан</h1>";
						echo '<p><strong style = "">Дата рождения: </strong>'.$data["datebirthday"].'</p>';
						echo '<p><strong style = "">Номер телефона: </strong>'.$data["tel"].'</p><hr>';
						if  (!empty($data['doctor']))
						{ 
							echo '<p><strong style = "">Список услуг: </strong></p>';
							echo '<a href="edit.php?id='.$id.'&flagedit=3">Просмотреть список</a>';
						}
						echo '<p><strong style = "">Вся сумма услуг: </strong>'.$data["all_sum"].'</p>';
						echo '<p><strong style = "">Услуг оказано на: </strong>'.$data["sumNow"].'</p><hr>';
						if  ($data['doctor']=='no')
						{
							echo '<p style = "background: hsl(357, 75%, 50%);"><strong style = "">Лечащий доктор: </strong>Доктор не назначен</p>';
							if ($_SESSION['typeUser'] == 'doc')
								echo '<a style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=4$stat=1">Стать лечащим врачем</a>';
						}
						else{
							echo '<p><strong style = "">Лечащий доктор: </strong>'.$data["doctor"].'</p>';
						}
						if (empty($data["dist"]))
							echo '<p style = "background: red;"><strong style = "">Описание: </strong> Описание отсутствует </p>';
						else
						echo '<p><strong style = "">Описание: </strong>'.$data["dist"].'</p><hr>';
						echo '<p><strong style = "">Дата поступления: </strong>'.$data["dateIn"].'</p>';
						$dateNow = $date->getDate();
						$dateIn = explode(' ', $data["dateIn"]);
						$counDay = $date->getPeriod($dateIn[0]) + 1;
						$costMestQuery = mysqli_query($connection, "SELECT * FROM mest WHERE id = '".$data['mest']."'");
						$costMestArr = mysqli_fetch_assoc($costMestQuery);
						$costMest = $costMestArr['value'];
						$costDay = $counDay * $costMest;
						echo '<p><strong style = "">Пациент занимает койко - место (#'.$data['mest'].'): </strong>'.$counDay.' ('.$costDay.' руб.)</p>';
						$compSum = $data["sumNow"] + $costDay;
						echo '<p><strong>Итого к оплате (Койко - место и услуги) : </strong>'.$compSum.' руб.</p>';
						echo '<p><strong>Уже внесено: </strong>'.$data["sum"].' руб.</p>';
						$transferSum = $compSum - $data["sum"];
						if (($data["sumNow"]+$costDay) == 0)
							$data["sumNow"] = 1;
						$perSum = ($data["sum"] / ($data["sumNow"] + $costDay)) * 100;
						if ($perSum > 100)
							$perSum = 100;
						echo '
						<hr>
						<progress max="100" value="'.$perSum.'">'.$perSum.'</progress>
						<p align = "center">Платеж внесен на '.$perSum.' %</p>
						<hr>';
						if ($data['status'] == '1')
						{
							if($_SESSION['typeUser'] == 'admin')
							{
								if($data["sum"] < $compSum)
									echo "<a id='inBtn' class='button' href='add.php?flagadd=6&stac=1&sum=".$transferSum."&id=".$data['id']."&flagop=1'>Внести сумму (".$transferSum." руб.)</a>";
								if($data["sum"] > $compSum)
									echo "<a id='inBtn' class='button' href='add.php?flagadd=6&stac=1&sum=".$transferSum."&id=".$data['id']."&flagop=1'>Вернуть деньги (".abs($transferSum)." руб.)</a>";
								if($data["sum"] == $compSum)
									echo "<a id='inBtn' class='button' href='edit.php?flagedit=8&id=".$data['id']."'>Выписать</a>";
							}
							if($_SESSION['typeUser'] == 'su')
								echo '<a class=\'button\' style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=7&stat=1">Редактировать</a>';
						echo '</div>';
						}
						else
							echo "<script>setTimeout(function(){self.location=\"add.php?flagadd=2&stac=1\";}, 1500);</script>";
					}
				}
			}

		public function getTablesMest($connection)
			{
				//Query
				$mestQuery = mysqli_query($connection, "SELECT * FROM mest");
				$countMest = mysqli_num_rows($mestQuery);

				if ($countMest == 0)
					echo "<p>Добавьте койко - место</p>";
				else
				{
					echo '<h1>Список койко мест</h1>';
					echo'<table>';
					$i = 1;
					echo '<tr>';
					while($dataDB = mysqli_fetch_assoc($mestQuery))
					{
						if($dataDB['status'] == 'free')
							echo '<td style = "background: green; text-align: center; margin: 3px;">'.$dataDB['id'].'<br>'.$dataDB['value'].'<br><a style = "color: white; font-size: 14px;"href="edit.php?flagedit=6&id='.$dataDB['id'].'"><img class="icon" src="img/editit.png" alt="Edit"></a></td>';
						else
							echo '<td style = "background: red; text-align: center; margin: 3px;">'.$dataDB['id'].'<br>'.$dataDB['value'].'<br><a  style = "color: white; font-size: 14px;" href="edit.php?flagedit=6&id='.$dataDB['id'].'"><img class="icon" src="img/editit.png" alt="Edit"></a></td>';
						if ($i % 7 == 0)
							echo '</tr><tr>';
						$i++;
					}
					echo '</tr>';
					echo '</table>';
				}
				echo '<a href="add.php?flagadd=7" class = "button">Добавить койко - место</a>';
			}

		public function getAddPatient($connection)
			{
				echo '
				<h1>Выберите тип лечения</h1>
				<div class="wrapp">
					<a href="add.php?flagadd=5&stac=0">
						<div class="btnBig1"><img class="icon" src="img/am.png" alt=""><p>Амбулатория</p></div>
					</a>
					<a href="add.php?flagadd=5&stac=1">
						<div class="btnBig2"><img class="icon" src="img/st.png" alt=""><p>Стационар</p></div>
					</a>
				</div>
				';	
			}

		public function getAddOperation($connection, $dateNow)
			{
				echo '
					    <div class="wrap">
					      <h1>Выберите где пациент лечится</h1>
					      <div class="btn-gr"> 
					        <a href="add.php?flagadd=6&stac=0">
					        <div class="btn-left">
					          <img src="img/am.png" alt="">
					          <p>Амбулатория</p>
					        </div></a>
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
					              else 
					              {
					                while($data = mysqli_fetch_assoc($sum))
					                {
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
					    </div>
					</div>
				';
			}

		function getParam()
			{
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
					  
					</div>
				';
			}

		function getBtn()
			{
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
					  
					</div>
				';
			}

		function inPat($connection, $set)
			{
				if($set == 0)
					$result = mysqli_query($connection, "SELECT * FROM `patient` ORDER BY id DESC LIMIT 30");
				else
					$result = mysqli_query($connection, "SELECT * FROM `patient` ORDER BY id DESC");


				if (mysqli_num_rows($result) == 0)
					echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
				else
				{
					echo'
					<table>';
					echo '
						<thead>
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

		function inOp($connection, $set)
		{	
			if ($set == 0) 
				{
					$result = mysqli_query($connection, "SELECT * FROM operation ORDER BY id DESC LIMIT 20");
					$this-> getOperationTable($connection, $result);
					echo '<a class="button" href="http://localhost/doc/input.php?flaginput=12&set=1">Вывести все операции</a>';
				}
				else
				{
					$result = mysqli_query($connection, "SELECT * FROM operation ORDER BY id DESC");
					$this-> getOperationTable($connection, $result);
				}
			
		}

		function getOperationTable($connection, $result)
			{

				

				if (mysqli_num_rows($result) == 0)
					echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
				else{
				echo'
					<table align="center">
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