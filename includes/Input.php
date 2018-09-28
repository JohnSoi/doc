<?php
	class Input{
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
							    echo '<td>'.$data['dol'].'</td>'; 
							    echo '<td>'.$data['username'].'</td>'; 
							    echo '<td>'.$data['password'].'</td>'; 
							    echo '<td>'.$data['value'].'</td>'; 
							    echo '<td>'.$data['money_prevMonth'].'</td>';
							    echo '<td>'.$data['money'].'</td>';
							    echo '<td>'.$data['uslugi_prevMonth'].'</td>';
							    echo '<td>'.$data['uslugi'].'</td>';
							    echo '<td><a href="edit.php?id='.$data['id'].'&flagedit=1"><img class = "icon" src="img/edit.png" alt="Изменить"></a></td>';
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
			if ($type == 0)
			{

				if ($_SESSION['typeUser'] == 'doc')
				{
					$doctor = mysqli_query($connection, "SELECT fio FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
					$data = mysqli_fetch_assoc($doctor);
					$result = mysqli_query($connection, "SELECT * FROM `patient` WHERE type = 'Амбулатория' AND  status = 1 AND (doctor = '".$data['fio']."' OR doctor = '')");
				}
				else
					$result = mysqli_query($connection, "SELECT * FROM `patient` WHERE type = 'Амбулатория' AND  status = 1");
			}
			else 
				$result = mysqli_query($connection, "SELECT * FROM `patient` WHERE type = 'Стационар' AND  status = 1");


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
					    <th rowspan="2" class="first">#</th>
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
							    echo '<td>'.$data['id'].'</td>';
							    echo '<td>'.$data['fio'].'</td>'; 
							    echo '<td>'.$data['datebirthday'].'</td>'; 
							    echo '<td>'.$data['tel'].'</td>'; 
							    echo '<td><a href="edit.php?id='.$data['id'].'&flagedit=3"><img class = "icon" src="img/list.png" alt="Посмотреть"></a></td>';
							    echo '<td>'.$data['all_sum'].'</td>';
							    if  (empty($data['doctor']))
							    	echo '<td style = "background: red;">Доктор не назначен</td>';
							    else
							    	echo '<td style = "background: green;">'.$data['doctor'].'</td>';
							    if  (empty($data['sum']))
							    	echo '<td style = "background: red;">Сумма не внесена</td>';
							    else
							    	echo '<td style = "background: green;">'.$data['sum'].'</td>';
							    if  (empty($data['dist']))
							    	echo '<td style = "background: red;">Заметок нет</td>';
							    else
							   		echo '<td>'.$data['dist'].'</td>';
							    echo '<td>'.$data['dateIn'].'</td>';
							    if ($type == 1)
							    	echo '<td>'.$data['mest'].'</td>'; 
							    echo '<td>';
							    if ($_SESSION['typeUser'] == 'doc')
							    	if (empty($data['doctor']))
							    		echo '<a style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=4">Стать лечащим врачем</a>';
							    	else
							    		echo '<p>Параметров нет</p>';
							    elseif ($_SESSION['typeUser'] == 'admin')
							    	echo '<a style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=5">Закрыть карту</a>';
							    elseif ($_SESSION['typeUser'] == 'su')
							    	echo '<a style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=5">Редактировать</a>';
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

		function getOperationTable($connection)
		{
			$result = mysqli_query($connection, "SELECT * FROM operation");

			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
			echo'
				<table>
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
							    	echo '<td style = "background: red;">'.$data['sum'].'</td>';
							    else
							    	echo '<td style = "background: green;">'.$data['sum'].'</td>';
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

		function getPacientPersonalTable($connection, $id)
		{
			$result = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");

			if (mysqli_num_rows($result) == 0)
				echo "<div align = 'center'><h1>Нет данных в Базе данных</h1></div>";
			else{
				while ($data = mysqli_fetch_assoc($result))
				{
					echo "<h1 align='center'>".$data['fio']."</h1>";
					echo '<p><strong style = "color:black;">Дата рождения: </strong>'.$data["datebirthday"].'</p>';
					echo '<p><strong style = "color:black;">Номер телефона: </strong>'.$data["tel"].'</p><hr>';
					echo '<p><strong style = "color:black;">Список услуг: </strong></p>';
					echo '<ol>';
						$uslugi = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
						while ($usl = mysqli_fetch_assoc($uslugi))
						{;
							if (!empty($usl['sp_uslug']))
								echo '<li>'.$usl['sp_uslug'].'</li>';
							else
								echo '<p style = "background: red;">Нет услуг</p>';
						}
					echo '</ol>';
					if ($_SESSION['typeUser'] == 'doc')
						echo '<a href="add.php?flagadd=3">Назначить</a><hr>';
					echo '<p><strong style = "color:black;">Вся сумма: </strong>'.$data["all_sum"].'</p>';
					echo '<p><strong style = "color:black;">Услуг оказано на: </strong>'.$data["sumNow"].'</p>';
					echo '<p><strong style = "color:black;">Внесенная сумма: </strong>'.$data["sum"].'</p><hr>';
					if  (empty($data['doctor']))
					{
						echo '<p style = "background: red;"><strong style = "color:black;">Лечащий доктор: </strong>Доктор не назначен</p>';
						if ($_SESSION['typeUser'] == 'doc')
							echo '<a style = "color: blue;" href="edit.php?id='.$data['id'].'&flagedit=4$stat=1">Стать лечащим врачем</a>';
					}
					else{
						echo '<p><strong style = "color:black;">Лечащий доктор: </strong>'.$data["doctor"].'</p>';
					}
					if (empty($data["dist"]))
						echo '<p style = "background: red;"><strong style = "color:black;">Описание: </strong> Описание отсутствует </p>';
					else
					echo '<p><strong style = "color:black;">Описание: </strong>'.$data["dist"].'</p><hr>';
					echo '<p><strong style = "color:black;">Дата поступления: </strong>'.$data["dateIn"].'</p>';
					require_once 'Date.php';
					$counDay = $date->getPeriod($data["dateIn"]) + 1;
					echo '<p><strong style = "color:black;">Пациент занимает койко - место: </strong>'.$counDay.'</p>';
				}
			}
		}
	} 
	$input = new Input;
?>