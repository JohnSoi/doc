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
					    <th colspan="3">Зарплата в месяц</th>
					    <th rowspan="2">Изменить</th>
					    <th rowspan="2">Удалить</th>
					  </tr>
					  <tr>
					    <td class="first">Прошлый</td>
					    <td class="first">Текущий</td>
					    <td class="first">Грядущий</td>
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
							    echo '<td>'.$data['money_nextMonth'].'</td>';
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
	} 
	$input = new Input;
?>