<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
  
	include("includes/DB.php");
  include("includes/Date.php");
  include('includes/DBOper.php');


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
  if (isset($_GET['sum']))
        {
          $sumOper = $_GET['sum'];
          $_SESSION['sum'] = $sumOper;
        }
        else
        {
          if(isset($_SESSION['sum']))
            $sumOper = $_SESSION['sum'];
          else
            $sumOper = 0;
        }
  if (isset($_GET['id']))
        {
          $idPacient = $_GET['id'];
          $_SESSION['id'] = $idPacient;
        }
        else
        {
          if(isset($_SESSION['id']))
            $idPacient = $_SESSION['id'];
        }
  if (isset($_GET['flagop']))
        {
          $operPacient = $_GET['flagop'];
          $_SESSION['flagop'] = $operPacient;
        }
        else
        {
          if(isset($_SESSION['flagop']))
            $operPacient = $_SESSION['flagop'];
        }
  
  //Обработка добавления персонала
  if($typePage == 1)
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
  //Обработка назначения услуг
  if($typePage == 3)
    {
      if(isset($_GET['submit']))
      {
        if(isset($_GET['serv']))
        {
            $coutnServPatientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPacient."'");
            $coutnServPatient = mysqli_fetch_assoc($coutnServPatientQuery);
            if($coutnServPatient['sp_uslug'] == '')
              $coutnServPatient = 0;
            $arrayServ = $_GET['serv'];
            $listServ = '';
            $sumServ = 0;
            for($i=0; $i<count($arrayServ);$i++)
            {
              $sumServQuery = mysqli_query($connection, "SELECT * FROM items WHERE id = '".$arrayServ[$i]."'");
              $sumServArr = mysqli_fetch_assoc($sumServQuery);
              $sumServ += $sumServArr['cost'];
              if(($i == 0) && ($coutnServPatient == 0))
                $listServ = $arrayServ[$i].'-0-0';
              else
                $listServ .= ','.$arrayServ[$i].'-0-0';
            }
            $servNow = $coutnServPatient['sp_uslug'];
            $servNow .= $listServ;
            $sumIn = $coutnServPatient['all_sum'] + $sumServ;
            $updateServPat = mysqli_query($connection, "UPDATE patient SET `sp_uslug` = '".$servNow."' WHERE id = '".$idPacient."'");
            $updateSumServPat = mysqli_query($connection, "UPDATE patient SET all_sum = '".$sumIn."' WHERE id = '".$idPacient."'");
            if($updateServPat && $updateSumServPat)
              $message = "Процедура добавлена";
        }
      }
    }
  //Обработка услуг
  elseif ($typePage == 4)
    {
        if(isset($_GET['submit']))
        {
          if(!empty($_GET['name']) & !empty($_GET['cost']))
          {
            $name = htmlspecialchars($_GET['name']);
            $cost = htmlspecialchars($_GET['cost']);
            $bonus = htmlspecialchars($_GET['bonus']);
            $dist = htmlspecialchars($_GET['dist']);

            $sql = 'SELECT * FROM `items` WHERE name = "'.$name.'"';
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
  //Обработка пациентов
  elseif($typePage == 5)
    {
        if(isset($_GET['submit']))
        {
          if (!empty($_GET['name']) & !empty($_GET['date']) & !empty($_GET['tel']))
          {
            $name = $_GET['name'];
            $dateBr =  $date->normalizeDate($_GET['date']);
            $dateIn = $date->getDateTime();
            $tel = $_GET['tel'];
            if($typeStat == 1)
              $mesto = $_GET['mesto'];
            else
              $mesto = "NULL";
            $zal = $_GET['zal'];
            if (!empty($_GET['typezal']))
              $typeZal = $_GET['typezal'];
            $ldoc = $_GET['ldoc'];
            if(isset($_GET['doctor']))
              $doctor = $_GET['doctor'];
            $message = 'a';
            if($typeStat == 0)
              $type = "Амбулатория";
            elseif($typeStat == 1)
              $type = 'Стационар';
            if($type == 'Стационар')
              if ($doctor == $ldoc)
                  $pacient = mysqli_query($connection, "INSERT INTO patient(fio,datebirthday, dateIn, tel, mest, sum, type, doctor, status) VALUES('".$name."','".$dateBr."','".$dateIn."', '".$tel."','".$mesto."','".$zal."','".$type."','".$ldoc."', '1')");
              else
                {
                  $doc = "Был принят доктором:".$doctor;
                  $pacient = mysqli_query($connection, "INSERT INTO patient(fio,datebirthday, dateIn, tel, mest, sum, type, doctor, dist, status) VALUES('".$name."','".$dateBr."','".$dateIn."', '".$tel."','".$mesto."','".$zal."','".$type."','".$ldoc."','".$doc."', '1')");
                }
            else
              $pacient = mysqli_query($connection, "INSERT INTO patient(fio,datebirthday, dateIn, tel, mest, sum, type, doctor, status) VALUES('".$name."','".$dateBr."','".$dateIn."', '".$tel."','".$mesto."','".$zal."','".$type."','".$ldoc."', '1')");

              if($typeStat == 1)
                {
                  $mest = mysqli_query($connection, "UPDATE mest SET status = 'busy' WHERE id = '".$mesto."'");
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
              {
                if($typeStat == 1)
                {
                  $cost = 'SELECT * FROM param WHERE name = "Прием"';
                  $setting = mysqli_query($connection, $cost);
                  while ($data = mysqli_fetch_assoc($setting))
                  {
                    $value = $data['value'];
                    $query = mysqli_query($connection, "SELECT * FROM usertbl WHERE fio ='".$doctor."'");
                    while ($data = mysqli_fetch_assoc($query))
                    {
                      $money = $data['money'] + $value;
                      $insert = mysqli_query($connection, "UPDATE usertbl SET money = '".$money."' WHERE fio ='".$doctor."'");
                    }
                  }
                }
                if ($message != "Ошибка заполнения")
                  $message = "Запись создана успешно";
              }
              else
                $message = "Ошибка заполнения";
          }
          else
            $message = "Заполните все поля";
        }
    }
  //Обработка операций
  elseif($typePage == 6)
    {
        if(isset($_GET['submit']))
        {
          if (!empty($_GET['name']) & !empty($_GET['zal']))
          {
            //Получение введенных значений
            $name = $_GET['name'];
            $dateIn = $date->getDateTime();
            $zal = $_GET['zal'];
            $typeZal = $_GET['typezal'];
            $message = 'a';
            if($typeStat == 0)
              $type = "Амбулатория";
            elseif($typeStat == 1)
              $type = 'Стационар';
              
            //Добавление записи в историю операций
            $operation = mysqli_query($connection, "INSERT INTO operation(sum, client, date, type, typeSum) VALUES('".$zal."', '".$name."', '".$dateIn."', '".$type."', '".$typeZal."')");

            //Получение текущей внесенной суммы пациентом
            $pacientQuery= mysqli_query($connection, "SELECT * FROM patient WHERE fio = '".$name."'");
            $patData = mysqli_fetch_assoc($pacientQuery);
            //Сложение текущей суммы с сумой-изменением
            $sumIn = $patData['sum'] + $zal;
            //Изменеие записи в БД
            $updPatient = mysqli_query($connection, "UPDATE patient SET sum = '".$sumIn."' WHERE fio = '".$name."'");

            //Проверка на успешность запроса
            if ($operation && $updPatient)
            {
                $message = "Запись создана успешно";
                if (isset($operPacient))
                {
                  if($patData['type'] == 'Амбулатория')
                    echo "<script>setTimeout(function(){self.location = 'input.php?flaginput=2';}, 500);</script>";
                  elseif($patData['type'] == 'Стационар')
                    echo "<script>setTimeout(function(){self.location = 'input.php?flaginput=3&id=".$patData['id']."';}, 500);</script>";
                }
                else
                    if($patData['type'] == 'Амбулатория')
                      echo "<script>setTimeout(function(){self.location = 'add.php?flagadd=2&stac=0';}, 500);</script>";
                    else
                      echo "<script>setTimeout(function(){self.location = 'add.php?flagadd=2&stac=1';}, 500);</script>";
            }
            else
              $message = "Ошибка заполнения";
          }
          else
            $message = "Заполните все поля";
        }
    }
  //Обработка добавления койко места
  elseif($typePage == 7)
    {
        if(isset($_GET['register']))
        {
          if(!empty($_GET['value']))
          {
            $costMest = $_GET['value'];
            $createMest = mysqli_query($connection, "INSERT INTO mest(status, value) VALUES('free', '".$costMest."')");
            if($createMest)
              $message = 'Место добавлено';
            else
              $message = 'Ошибка ввода';
          }
          else
            $message = 'Заполните поле Стоимость';
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
          //Регистрация нового пользователя
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
          //Назначение услуги
          case 3:
            $servQuery = mysqli_query($connection, "SELECT * FROM items");
            echo '
              <div class="content">
                <section class="add">

                <div class="wrap">
                <h2>Назначение услуги</h2>
                <form action="add.php" method="get">
            ';
            while($dataServ = mysqli_fetch_assoc($servQuery))
                 {
                   echo '<div class="line"><p>'.$dataServ['name'].'</p>';
                   echo '<input style="float:right;" type="checkbox" name="serv[]" value="'.$dataServ['id'].'"><br></div>';
                 }     
            echo '<input type="submit" name="submit" value="Назначить">
            </form>
            </div>
            </section>
            </div>
            ';
            break;
          //Регистрация новой услуги
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
          //Добавление пациента
          case 5:
            echo '
              <div class="cont-client">';
                if ($typeStat == 0)
                   echo '<h1>Прием пациента в амбулаторию</h1>';
                 else
                  echo '<h1>Прием пациента в стационар</h1>';
                echo'
                    <div class="date">Дата записи: '.$date->getDateTime().'</div>
                    <form action="add.php" method="GET">
                      <p><label for="name">ФИО пациента<br><input name="name" type="text"></label></p>
                      <p><label for="date">Дата рождения<br><input name="date" type="date"></label></p>
                      <p><label for="tel">Номер телефона<br><input id="tel" name="tel" type="tel"></label></p>';
                      if ($typeStat == 1){
                        echo '<p><label for="mesto">Койко-место<br><select name="mesto">';
                        $query = "SELECT * FROM mest WHERE status = 'free'";
                        $sql = mysqli_query($connection, $query);
                        $freeBath = mysqli_num_rows($sql);
                        if (mysqli_num_rows($sql) == 0)
                        {
                          echo '<option value="no">Нет койко-мест</option>';
                        }
                        else
                        {
                          while($row=mysqli_fetch_assoc($sql))
                          echo '<option value="'.$row[id].'">Койко-место №'.$row[id].'</option>';
                        }
                        echo'
                        </select></label></p>';}
                      if ($typeStat == 1){
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
                      }
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
                      </select></label></p>';
                      if ($typeStat == 1)
                        if ($freeBath == 0)
                          echo '<p>Нет койко-мест</p>';
                        else
                          echo '<input type="submit" class="button" name="submit" value="Добавить">';
                      else
                        echo '<input type="submit" class="button" name="submit" value="Добавить">';    
                      echo '
                    </form>
                  </div>
                  <script src="js/zal.js"></script>
              ';
            break;
          //Добавление денежной операции
          case 6:
           echo '
            <div class="cont-client">';
                if ($typeStat == 0)
                   echo '<h1>Добавление денежной операции в амбулаторию</h1>';
                 else
                  echo '<h1>Добавление денежной операции в стационар</h1>';
                if(isset($_GET['id']))
                {
                  $patientQuery = mysqli_query($connection, "SELECT fio FROM patient WHERE id = '".$idPacient."'");
                  $fioPacient = mysqli_fetch_assoc($patientQuery);
                  $fioPacient = $fioPacient['fio'];
                }
                else
                  if ($typeStat == 0)
                    $patientQuery = mysqli_query($connection, "SELECT fio FROM patient WHERE type = 'Амбулатория' AND status = '1'");
                  else
                    $patientQuery = mysqli_query($connection, "SELECT fio FROM patient WHERE type = 'Стационар' AND status = '1'");

                echo'
                    <div class="date">Дата операции: '.$date->getDateTime().'</div>
                    <form action="add.php" method="GET">

                    <p><label for="name">Пациент<br><select  name="name">';
                        if(isset($_GET['id']))
                          echo '<option value="'.$fioPacient.'">'.$fioPacient.'</option>';
                        else
                          while($dataDB = mysqli_fetch_assoc($patientQuery))
                          {
                            echo '<option value="'.$dataDB['fio'].'">'.$dataDB['fio'].'</option>';
                          }
                        echo '
                      </select></label></p>
                      <p><label for="zal">Внесенная сумма<br><input name="zal" value="'.$sumOper.'" type="text"></label></p>
                      <p><label for="typezal">Тип платежа<br><select  name="typezal">
                        <option value="nal">Наличный</option>
                        <option value="beznal">Безналичный</option>
                      </select></label></p> 
                      <input type="submit" class="button" name="submit" value="Добавить">
                    </form>
                </div>';
            break;
          //Добавление койко - места
          case 7:
            echo '
              <div class="container mregister">
                  <div id="loginin">
                    <h1>Добавление нового койко - места</h1>
                    <form action="add.php" id="registerform" method="get" name="registerform">
                      <p>
                        <label for="value">Стоимость одного дня проживания<br>
                        <input class="input" id="value" name="value" size="32"  type="text" value=""></label>
                      </p>
                      <p class="submit">
                        <input class="button" id="register" name= "register" type="submit" value="Добавить">
                      </p>
                    </form>
                  </div>
                </div>
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
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.mask.definitions['~'] = "[+-]";
        $("#tel").mask("8 (999) 999-9999");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });

</script>
</body>
</html>