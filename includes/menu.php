<?php
	$username = $access->getUserName();
	$typeuser = $_SESSION['typeUser'];
	
	switch ($typeuser)
	{
		case 'su':
			echo '
			  <div class="menu">
			    <a href="#" class="menu-btn"><span></span></a>
			    <nav class="menu-list">
			      <figure id = "gr1"><span>Амбулатория</span></figure>
						<div id="hidgr1">
							<a href="add.php?flagadd=2&stac=0">Прием</a>
							<a href="input.php?flaginput=2">Отчет</a>
							<a href="stat.php?flagstat=1">Статистика</a>
						</div>
			      <figure id = "gr2"><span>Стационар</span></figure>
					<div id="hidgr2">
						<a href="add.php?flagadd=2&stac=1">Прием</a>
						<a href="input.php?flaginput=3">Отчет</a>
						<a href="stat.php?flagstat=2">Статистика</a>
					</div>
			      <figure id = "gr3"><span>Настройки</span></figure>
					<div id="hidgr3">
						<a href="input.php?flaginput=5">Список операций</a>
						<a href="param.php">Параметры</a>
						<a href="input.php?flaginput=1">Персонал</a>
						<a href="input.php?flaginput=4">Услуги</a>
					</div>
			      <a href="logout.php">Выход</a>
			      <figure id = "bot-date">
				      	Вы авторизовались как :';
			echo $username;
		    echo '
				<br>
			    Тип учетной записи: ';
	  		echo $_SESSION['typeUser'];
			echo '
			  	  </figure>
			    </nav>
			  </div>';
		break;

		case 'doc':
			echo '
				<div class="menu">
			    <a href="#" class="menu-btn"><span></span></a>
			    <nav class="menu-list">
			      <figure id = "gr1"><span>Амбулатория</span></figure>
						<div id="hidgr1">
							<a href="input.php?flaginput=2">Отчет</a>
						</div>
			      <figure id = "gr2"><span>Стационар</span></figure>
					<div id="hidgr2">
						<a href="input.php?flaginput=3">Отчет</a>
					</div>
			      <a href="logout.php">Выход</a>
			      <figure id = "bot-date">
				      	Вы авторизовались как :';
			echo $username;
		    echo '
				<br>
			    Тип учетной записи: ';
	  		echo $_SESSION['typeUser'];
			echo '
			  	  </figure>
			    </nav>
			  </div>';
		break;

		case 'view':
			echo '
			<div class="menu">
			    <a href="#" class="menu-btn"><span></span></a>
			    <nav class="menu-list">
			      <figure id = "gr1"><span>Амбулатория</span></figure>
						<div id="hidgr1">
							<a href="stat.php?falgstat=1">Статистика</a>
						</div>
			      <figure id = "gr2"><span>Стационар</span></figure>
					<div id="hidgr2">
						<a href="stat.php?falgstat=2">Статистика</a>
					</div>
			      <a href="logout.php">Выход</a>
			      <figure id = "bot-date">
				      	Вы авторизовались как :';
			echo $username;
		    echo '
				<br>
			    Тип учетной записи: ';
	  		echo $_SESSION['typeUser'];
			echo '
			  	  </figure>
			    </nav>
			  </div>';
		break;

		case 'admin':
			echo ' 
			<div class="menu">
			    <a href="#" class="menu-btn"><span></span></a>
			    <nav class="menu-list">
			      <figure id = "gr1"><span>Амбулатория</span></figure>
						<div id="hidgr1">
							<a href="add.php?flagadd=2">Прием</a>
						</div>
			      <figure id = "gr2"><span>Стационар</span></figure>
					<div id="hidgr2">
						<a href="add.php?flagadd=3">Прием</a>
					</div>
			      <a href="logout.php">Выход</a>
			      <figure id = "bot-date">
				      	Вы авторизовались как :';
			echo $username;
		    echo '
				<br>
			    Тип учетной записи: ';
	  		echo $_SESSION['typeUser'];
			echo '
			  	  </figure>
			    </nav>
			  </div>';
		break;
	}
?>