<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
  
	include ('includes/LogIO.php');
	include("includes/DB.php");
  include("includes/Date.php");


	if (isset($_GET['flagadd']))
      	{
      		$typePage = $_GET['flagadd'];
      		$_SESSION['flagadd'] = $typePage;
      	}
      	else
      	{
      		$typePage = $_SESSION['flagadd'];
      	}
  if (isset($_GET['stac']))
        {
          $typeStat = $_GET['stac'];
          $_SESSION['stac'] = $typeStat;
        }
        else
        {
          if(isset($_SESSION['stac']))
            $typeStat = $_SESSION['stac'];
        }

    if ($typePage == 1)
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
     				//Запрос к БД и получения количества строк
    				$query=mysqli_query($connection, "SELECT * FROM usertbl WHERE username='".$username."'");
    				$numrows=mysqli_num_rows($query);
     				//Если запрос пустой, внести данные, если нет - вывсети ошибку
    				if($numrows==0)
    				{
    					//Текст запроса
    					$sql="INSERT INTO usertbl (fio, dol, username, password, value)
    						VALUES('$full_name','$dol', '$username', '$password', '$value')";
    					//Выполнение запроса
    					$result=mysqli_query($connection, $sql);
     					//Проверка успешности
    					if($result)
    					{
    						$message = "Пользователь успешно создан!"; 
    						echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=1\";}, 2500);</script>";
    					}
    					else 
    					{
    					 	$message = "Ошибка запроса, обратитесь к администратору!";
    					}
    				} 
    				else 
    				{
    					$message = "Пользователь существует, попробуйте другие данные";
    			   	}
    			} 
    			else 
    			{
    				$message = "Все поля обязательны для заполнения!";
    			}
    		}
    	}

      elseif ($typePage == 4)
      {
        if(isset($_GET['submit']))
        {
          if(!empty($_GET['name']) & !empty($_GET['cost']) & !empty($_GET['bonus']))
          {
            $name = htmlspecialchars($_GET['name']);
            $cost = htmlspecialchars($_GET['cost']);
            $bonus = htmlspecialchars($_GET['bonus']);
            $dist = htmlspecialchars($_GET['dist']);

            $sql = "SELECT * FROM items WHERE name = ".$name;
            $query = mysqli_query($connection, $sql);

            if(mysqli_num_rows($query) == 0){
              $sql = "INSERT INTO items(name,cost,dist,bonus) VALUES('".$name."','".$cost."','".$dist."','".$bonus."')";
              $query = mysqli_query($connection, $sql);
              if($query)
                {
                  $message = "Добавление успешно";
                  echo "<script>setTimeout(function(){self.location=\"input.php?flaginput=4\";}, 1500);</script>";
                }
              else
                $message = "Данные не обработаны";
            }
            else
            {
              $message = "Такая услуга уже существует!";
            }
          }
          else{
              $message = "Все поля обязательны для заполнения!";
            }         
        }
      }
      elseif($typePage == 5)
      {
        if(isset($_GET['submit']))
        {
          if (!empty($_GET['name']) & !empty($_GET['date']) & !empty($_GET['tel']) & !empty($_GET['doctor']))
          {
            $name = $_GET['name'];
            $dateBr =  $date->normalizeDate($_GET['date']);
            $dateIn = $date->getDate();
            $tel = $_GET['tel'];
            if($typeStat == 1)
              $mesto = $_GET['mesto'];
            else
              $mesto = "NULL";
            $zal = $_GET['zal'];
            if (!empty($_GET['typezal']))
              $typeZal = $_GET['typezal'];
            $ldoc = $_GET['ldoc'];
            $doctor = $_GET['doctor'];
            $message = 'a';
            if($typeStat == 0)
              $type = "Амбулатория";
            elseif($typeStat == 1)
              $type = 'Стационар';
              if ($doctor == $ldoc)
                  $pacient = mysqli_query($connection, "INSERT INTO patient(fio,datebirthday, dateIn, tel, mest, sum, type, doctor) VALUES('".$name."','".$dateBr."','".$dateIn."', '".$tel."','".$mesto."','".$zal."','".$type."','".$ldoc."')");
              else{
                $doc = "Был принят доктором ".$doctor;
                $pacient = mysqli_query($connection, "INSERT INTO patient(fio,datebirthday, dateIn, tel, mest, sum, type, dist) VALUES('".$name."','".$dateBr."','".$dateIn."', '".$tel."','".$mesto."','".$zal."','".$type."','".$doc."')"); 
              }
              if($typeStat == 1)
                {
                  $mest = mysqli_query($connection, "UPDATE mest SET status = 'busy' WHERE id = ".$mesto);
                  if ($mest)
                    $message = "Запись создана успешно";
                  else
                    $message = "Ошибка заполнения";
                }
              if ($zal != 0)
                {
                  $operation = mysqli_query($connection, "INSERT INTO operation(sum, client, date, type, typeSum) VALUES('".$zal."', '".$name."', '".$dateIn."', '".$type."', '".$typeZal."')");
                  if ($operation)
                    if ($message != "Ошибка заполнения")
                      $message = "Запись создана успешно";
                  else
                    $message = "Ошибка заполнения";
                }
              if ($pacient)
                if ($message != "Ошибка заполнения")
                  $message = "Запись создана успешно";
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
	<title>Добавление</title>
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
      	

      	switch ($typePage)
      	{
      		case 1:
      			echo'
	    					<div class="container mregister">
	    						<div id="loginin">
	    							<h1>Регистрация нового пользователя</h1>
	    							<form action="add.php" id="registerform" method="get" name="registerform">
	    								<p>
	    									<label for="full_name">Полное имя<br>
	    									<input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label>
	    								</p>
 	    								<p><label for="radio">Выберите тип учетной записи<br>
	    									<input name="dol" type="radio" value="ddoc">Дежурный Доктор<br>
                        <input name="dol" type="radio" value="doc">Доктор<br>
	    									<input name="dol" type="radio" value="view">Наблюдатель<br>
	    									<input name="dol" type="radio" value="admin">Администратор<br>
	    									<input name="dol" type="radio" value="su">Суперпользователь<br>
	    									</label>
	    								</p>
 	    								<p>
	    									<label for="username">Имя пользователя<br>
	    									<input class="input" id="username" name="username"size="20" type="text" value=""></label>
	    								</p>
 	    								<p>
	    									<label for="user_pass">Пароль<br>
	    									<input class="input" id="password" name="password"size="32" type="password" value=""></label>
	    								</p>
 	    								<p>
	    									<label for="value">Процентная ставка<br>
	    									<input class="input" id="value" name="value" size="20" type="float" value=""></label>
	    								</p>
 	    								<p class="submit">
	    									<input class="button" id="register" name= "register" type="submit" value="Зарегестрировать">
	    								</p>
	    				 			</form>
	    						</div>
	    					</div>
	    				';
      			break;
      		case 2:
          echo '     
            <div class="cont-client">
              <h1>Добавление в амбулаторию</h1>
              <div class="block1"><img class="icon_big" src="img/addpac.png" alt=""><br><a href="add.php?flagadd=5&stac=0">Прием пациента</a></div>
              <div class="block2"><img class="icon_big" src="img/money.png" alt=""><br><a href="add.php?flagadd=6&stac=0">Денежные операции</a></div>
              <div class="block3"><h1>Статистика за сегодня</h1>';
                  $sum = ($connection, "SELECT sum FROM operation WHERE date = ".)
              echo '
              </div>
            </div>
          ';
      			break;
      		case 3:
      			echo '
            <div class="cont-client">
              <h1>Добавление в стационар</h1>
              <div class="block1"><img class="icon_big" src="img/addpac.png" alt=""><br><a href="add.php?flagadd=5&stac=1">Прием пациента</a></div>
              <div class="block2"><img class="icon_big" src="img/money.png" alt=""><br><a href="add.php?flagadd=6&stac=1">Денежные операции</a></div>
              <div class="block3"><h1>Статистика за сегодня</h1></div>
            </div>
          ';
      			break;
      		case 4:
      			echo '
              <div class="container mregister">
                  <div id="loginin">
                    <h1>Регистрация новой услуги</h1>
                    <form action="add.php" method="GET">
                      <p><label for="name">Название услуги<br><input name="name" type="text"></label></p>
                      <p><label for="cost">Стоимость<br><input name="cost" type="text"></label></p>
                      <p><label for="bonus">Бонус за предоставление<br><input name="bonus" type="text"></label></p>
                      <p><label for="bonus">Описание<br><input name="dist" type="text"></label></p>
                      <input type="submit" class="button" name="submit" value="Добавить">
                    </form>
                  </div>
                </div>
            ';
      			break;
          case 5:
            echo '
              <div class="cont-client">';
                if ($typeStat == 0)
                   echo '<h1>Прием пациента в амбулаторию</h1>';
                 else
                  echo '<h1>Прием пациента в стационар</h1>';
                echo'
                    <div class="date">Дата записи: '.$date->getDate().'</div>
                    <form action="add.php" method="GET">
                      <p><label for="name">ФИО пациента<br><input name="name" type="text"></label></p>
                      <p><label for="date">Дата рождения<br><input name="date" type="date"></label></p>
                      <p><label for="tel">Номер телефона<br><input name="tel" type="tel"></label></p>';
                      if ($typeStat == 1){
                        echo '<p><label for="mesto">Койко-место<br><select name="mesto">';
                        $query = "SELECT * FROM mest WHERE status = 'free'";
                        $sql = mysqli_query($connection, $query);
                        if (mysqli_num_rows($sql) == 0)
                        {
                          echo "Нет свободных мест";
                        }
                        else
                        {
                          while($row=mysqli_fetch_assoc($sql))
                          echo '<option value="'.$row[id].'">Койко-место №'.$row[id].'</option>';
                        }
                        echo'
                        </select></label></p>';}
                        echo '<p><label for="doctor">Принимающий врач<br><select name="doctor">';
                        $query = "SELECT * FROM usertbl WHERE dol = 'doc' OR dol = 'ddoc'";
                        $sql = mysqli_query($connection, $query);
                        if (mysqli_num_rows($sql) == 0)
                        {
                          echo "Не заполнены врачи";
                        }
                        else
                        {
                          while($row=mysqli_fetch_assoc($sql))
                          echo '<option value="'.$row[fio].'">'.$row[fio].'</option>';
                        }
                        echo'
                        </select></label></p>';
                        echo '<p><label for="ldoc">Лечащий врач<br><select name="ldoc">';
                        $query = "SELECT * FROM usertbl WHERE dol = 'doc'";
                        $sql = mysqli_query($connection, $query);
                        echo '<option value="no">Нет врача</option>';
                        if (mysqli_num_rows($sql) == 0)
                        {
                          echo "Не заполнены врачи";
                        }
                        else
                        {
                          while($row=mysqli_fetch_assoc($sql))
                          echo '<option value="'.$row[fio].'">'.$row[fio].'</option>';
                        }
                        echo'
                        </select></label></p>';
                      echo '
                      <p><label for="zal">Внесенная сумма<br><input id="zal" name="zal" value="0" type="text"></label></p>
                      <p><label id="typeZal" for="typezal">Тип платежа<br><select  name="typezal">
                        <option value="nal">Наличный</option>
                        <option value="beznal">Безналичный</option>
                      </select></label></p> 
                      <input type="submit" class="button" name="submit" value="Добавить">
                    </form>
                </div>
                <script src="js/zal.js"></script>
            ';
          break;
      		default:
      			echo "<h2>Перенаправление на странцу авторизации</h2>";
      			echo "<script>setTimeout(function(){self.location=\"login.php\";}, 1500);</script>";
      			break;

      	}
      ?>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>