<?php
	$username = $access->getUserName();
	$typeusername = "SuperUser";
	
	echo '
		  <div class="menu">
		    <a href="#" class="menu-btn"><span></span></a>
		    <nav class="menu-list">
		      <figure id = "gr1"><span><a href="#">Амбулатория</a></span></figure>
					<div id="hidgr1">
						<a href="">Прием</a>
						<a href="">Отчет</a>
						<a href="">Статистика</a>
					</div>
		      <figure id = "gr2"><span><a href="#">Стационар</a></span></figure>
				<div id="hidgr2">
					<a href="">Прием</a>
					<a href="">Отчет</a>
					<a href="">Статистика</a>
				</div>
		      <figure id = "gr3"><span><a href="param.php">Настройки</a></span></figure>
				<div id="hidgr3">
					<a href="">Параметры</a>
					<a href="input.php?flaginput=1">Персонал</a>
					<a href="">Услуги</a>
				</div>
		      <figure id = "gr4"><span><a href="#">Выход</a></span></figure>
		      <figure id = "bot-date">
			      	Вы авторизовались как :';
			      	 echo $username;
			      	 echo '
					<br>
			      	Тип учетной записи: ';
			      		echo $typeusername; 
			    echo '
		  	  </figure>
		    </nav>
		  </div>
	';
?>