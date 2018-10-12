<?php
	require_once 'LogIO.php';

	$username = $access->getUserName();
	$typeuser = $_SESSION['typeUser'];
	switch ($typeuser)
	{
		case 'doc':
			$typeUser = 'Доктор';
			break;
		case 'ddoc':
			$typeUser = 'Дежурный врач';
			break;
		case 'admin':
			$typeUser = 'Администратор';
			break;
		case 'view':
			$typeUser = 'Наблюдатель';
			break;
		case 'su':
			$typeUser = 'Суперпользователь';
			break;
		default:
			$typeUser = 'Я не знаю кто ты!-_-';
			break;
	} 
	echo '
	  	<div class="menu">
	    	<a href="#" class="menu-btn"><span></span></a>
			    <nav class="menu-list">
					<div class="groupBtn"><figure>
					';
					if (($typeuser == 'admin') or ($typeuser == 'su'))
						echo '<a href=""><img src="img/addCl.png" alt="Add" class="icon"></a>';
					if (($typeuser == 'admin') or ($typeuser == 'su') or ($typeuser == 'doc'))
						echo '<a href="input.php?flaginput=2"><img src="img/report.png" alt="" class="icon"></a>';
					if (($typeuser == 'admin') or ($typeuser == 'su'))
						echo '<a href=""><img src="img/cost.png" alt="" class="icon"></a>';
					if($typeuser == 'su')
						echo '<a href=""><img src="img/set.png" alt="" class="icon"></a>';
					echo '
					</figure>
					</div>
			    ';

						// if (($typeuser == 'admin') or ($typeuser == 'su'))
						// 	echo '<a href="add.php?flagadd=2&stac=0">Прием</a>';

						// if (($typeuser == 'admin') or ($typeuser == 'su') or ($typeuser == 'doc'))
						// 	echo '<a href="input.php?flaginput=2">Отчет</a>';

						// if (($typeuser == 'view') or ($typeuser == 'su'))
						// 	echo '<a href="stat.php?flagstat=1">Статистика</a>';

						echo '
			      <figure id = "gr2"><span>Стационар</span></figure>

					<div id="hidgr2">';

						if ($typeuser == 'doc')
						{
							$doctor = mysqli_query($connection, "SELECT fio FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
							$data = mysqli_fetch_assoc($doctor);
							$query = "SELECT * FROM patient WHERE type = 'Стационар' AND status = '1' AND (doctor = '".$data['fio']."' OR doctor = 'no')";
						}
						if (($typeuser == 'admin') or ($typeuser == 'su'))
							$query = "SELECT * FROM patient WHERE type = 'Стационар' AND status = '1'";

						if (($typeuser == 'admin') or ($typeuser == 'su') or ($typeuser == 'doc'))
						{
						$result = mysqli_query($connection, $query);
						if (mysqli_num_rows($result) == 0)
							echo 'Пациентов нет';
						else
							echo '<ol>';
								while ($data = mysqli_fetch_assoc($result)) {
									echo "<li><a href=\"input.php?flaginput=3&id=".$data['id']."\">".$data['fio']."</a></li>";
								}
							echo '</ol>';
						}
						echo '</div>';

				// if($typeuser == 'su')
				// {
			 //      echo '<figure id = "gr3"><span>Настройки</span></figure>		
				// 	<div id="hidgr3">
				// 		<a href="input.php?flaginput=6">Настройка койко мест</a>
				// 		<a href="input.php?flaginput=5">Список операций</a>
				// 		<a href="param.php">Параметры</a>
				// 		<a href="input.php?flaginput=1">Персонал</a>
				// 		<a href="input.php?flaginput=4">Услуги</a>	
				// 	</div>';
				// }

				echo '
			      <figure id = "bot-date">
						<img src="img/user.png" alt="" class="icon">
			      ';
			      $username = mysqli_query($connection, "SELECT fio FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
			      $data = mysqli_fetch_assoc($username);
			      echo $data['fio'].',<br>'.$typeUser;
					
			echo '
			<a href="logout.php"><img src="img/exit.png" alt="" class="icon"></a>
			  	  </figure>
			    </nav>
			  </div>';
?>