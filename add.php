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
    			if(!empty($_GET['full_name']) && !empty($_GET['dol']) && !empty($_GET['username']) && !empty($_GET['password'])) 
    			{
    				//Получение значений из полей
    				$full_name= htmlspecialchars($_GET['full_name']);
    				$dol=htmlspecialchars($_GET['dol']);
    				$username=htmlspecialchars($_GET['username']);
    				$password=htmlspecialchars($_GET['password']);
    				if(isset($_GET['value']))
              $value=htmlspecialchars($_GET['value']);
            else
              $value = 0;
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
    						$DataBase->route();
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
  //назначение койко - места
  elseif($typePage == 2)
    {
      if(isset($_GET['mest']))
      {
        $idMest = $_GET['mest'];
        //Данные о пациентах храняться в ассоциативном массиве
        $PatientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPacient."'");
        $dataDB = mysqli_fetch_assoc($PatientQuery);
      
        $mest = $dataDB['mest'];
        $listMest = explode(',', $mest);
        $countMest = count($listMest);
        if ($countMest == 0)
          $listMestIn = $idMest;
        else
          $listMestIn =  $mest.','.$idMest;
        $queryUpd = mysqli_query($connection, "UPDATE patient SET mest = '".$listMestIn."' WHERE id = '".$idPacient."'");
        if($queryUpd)
          echo "<script>setTimeout(function(){window.close();}, 500);</script>";
      }
    }
  //Обработка назначения услуг
  elseif($typePage == 3)
    {
      if(isset($_GET['submit']))
      {
        if(isset($_GET['serv']))
        {
            $doctor = mysqli_query($connection, "SELECT * FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
            $dataDOC = mysqli_fetch_assoc($doctor);
            $idDoctor = $dataDOC['id'];
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
                $listServ = $arrayServ[$i].'-'.$idDoctor.'-0-0';
              else
                $listServ .= ','.$arrayServ[$i].'-'.$idDoctor.'-0-0';
            }
            $servNow = $coutnServPatient['sp_uslug'];
            $servNow .= $listServ;
            $sumIn = $coutnServPatient['all_sum'] + $sumServ;
            $updateServPat = mysqli_query($connection, "UPDATE patient SET `sp_uslug` = '".$servNow."' WHERE id = '".$idPacient."'");
            $updateSumServPat = mysqli_query($connection, "UPDATE patient SET all_sum = '".$sumIn."' WHERE id = '".$idPacient."'");
            if($updateServPat && $updateSumServPat)
            {
              $message = "Процедура добавлена";
              echo "<script>setTimeout(function(){window.close();}, 100);</script>";
            }
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
                  $DataBase->route();                }
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
            $tel = $_GET['tel'];;
            $message = 'a';
            if($typeStat == 0)
              $type = "Амбулатория";
            elseif($typeStat == 1)
              $type = 'Стационар';
            $doctorQuery = mysqli_query($connection, "SELECT * FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
            $doctorArray = mysqli_fetch_assoc($doctorQuery);
            $doctorName = $doctorArray['fio'];
            $pacient = mysqli_query($connection, "INSERT INTO patient(fio,datebirthday, dateIn, tel, mest, sum, type, doctor, status) VALUES('".$name."','".$dateBr."','".$dateIn."', '".$tel."','0','0','".$type."','".$doctorName."', '1')");

            if ($pacient)
              {
                  $cost = 'SELECT * FROM param WHERE name = "Прием"';
                  $setting = mysqli_query($connection, $cost);
                  while ($data = mysqli_fetch_assoc($setting))
                    {
                      $value = $data['value'];
                      $query = mysqli_query($connection, "SELECT * FROM usertbl WHERE fio ='".$doctorName."'");
                      while ($data = mysqli_fetch_assoc($query))
                        {
                          $money = $data['money'] + $value;
                          $insert = mysqli_query($connection, "UPDATE usertbl SET money = '".$money."' WHERE fio ='".$doctorName."'");
                        }
                    }
              if ($message != "Ошибка заполнения")
                {
                  $message = "Запись создана успешно";
                  $patientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE fio = '".$name."'");
                  $patientArray = mysqli_fetch_assoc($patientQuery);
                  echo $id = $patientArray['id'];
                  $_SESSION['link'] = 'input.php?flaginput=3&id='.$id;
                  $DataBase->route();
                }
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
                {
                    if($_SESSION['fl']==1)
                      echo "<script>setTimeout(function(){window.close();}, 500);</script>";
                    if($patData['type'] == 'Амбулатория')
                      $DataBase->route();
                    else
                      $DataBase->route();
                }
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
            {
              $message = 'Место добавлено';
              $DataBase->route();
            }
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
  <link rel="stylesheet" href="css/menu.css">
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
	    									<input class="input" id="full_name" name="full_name"size="32"  type="text" value="" required></label>
	    								</p>
 	    								<p><label for="radio">Выберите тип учетной записи<br>
                      <select name="dol" id="dol">
	    									<option value="ddoc">Дежурный Доктор</option>
                        <option value="doc">Доктор</option>
	    									<option value="view">Наблюдатель</option>
	    									<option value="admin">Администратор</option>
	    									<option value="su">Суперпользователь</option>
                        </select>
	    									</label>
	    								</p>
 	    								<p>
	    									<label for="username">Имя пользователя<br>
	    									<input class="input" id="username" name="username"size="20" type="text" value="" required></label>
	    								</p>
 	    								<p>
	    									<label for="user_pass">Пароль<br>
	    									<input class="input" id="password" name="password"size="32" type="password" value="" required></label>
	    								</p>
 	    								<p>
	    									<label id="value" style="display: none;" for="value">Процентная ставка<br>
	    									<input  class="input" name="value" size="20" type="float" value="" pattern="[0-9]{1,3}"></label>
	    								</p>
 	    								<p class="submit">
	    									<input class="button" id="register" name= "register" type="submit" value="Зарегестрировать">
	    								</p>
	    				 			</form>
	    						</div>
	    					</div>
                <script> 
                  var chkType = document.getElementById("dol");
                  var inVal = document.getElementById("value");

                  chkType.onchange = function(){
                    if(chkType.value == "doc")
                      inVal.style.display = "block";
                    else
                       inVal.style.display = "none";
                  }
                </script>	    				';
      			break;
          //Добавление койко - места
          case 2:
            echo '
              <form action="add.php">
              <label for="mest">
                <p>
                  <select name="mest">';
                    $mestQuery = mysqli_query($connection, "SELECT * FROM mest");
                    while($dataDB = mysqli_fetch_assoc($mestQuery))
                    {
                      echo '<option value="'.$dataDB['id'].'"> Койко место №'.$dataDB['id'].' ('.$dataDB['value'].')</option>';
                    }
                  echo '  
                  </select>
                </p>
              </label>
                <p><input type="submit" value="Добавить"></p>
              </form>
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
                      <p><label for="name">Название услуги<br><input name="name" type="text" required></label></p>
                      <p><label for="cost">Стоимость<br><input name="cost" type="text" required pattern="^[0-9]+$"></label></p>
                      <p><label for="bonus">Бонус за предоставление<br><input name="bonus" type="text" pattern="^[0-9]+$"></label></p>
                      <p><label for="bonus">Описание<br><input name="dist" type="text"></label></p>
                      <input type="submit" class="button" name="submit" value="Добавить">
                    </form>
                  </div>
                </div>
            ';
      			break;
          //Добавление пациента
          case 5:
            $DBO->checkDate($connection, $date->getDateTime());
            $doctorQuery = mysqli_query($connection, "SELECT * FROM usertbl WHERE username = '".$_SESSION['session_username']."'");
            $doctorArray = mysqli_fetch_assoc($doctorQuery);
            $doctorName = $doctorArray['fio'];
            echo '
              <div class="cont-client">';
                if ($typeStat == 0)
                   echo '<h1>Прием пациента в амбулаторию</h1>';
                 else
                  echo '<h1>Прием пациента в стационар</h1>';
                echo'
                    <div class="date">Дата записи: '.$date->getDateTime().'</div>
                    <form action="add.php" method="GET">
                      <p><label for="name">ФИО пациента<br><input name="name" type="text" required></label></p>
                      <p><label for="date">Дата рождения<br><input name="date" type="date" required></label></p>
                      <p><label for="tel">Номер телефона<br><input id="tel" name="tel" type="tel" required></label></p>
                      <p>Лечащий доктор:'.$doctorName.'</p>
                      <input type="submit" class="button" name="submit" value="Добавить">   
                    </form>
                  </div>
              ';
            break;
          //Добавление денежной операции
          case 6:
           echo '
            <div class="cont-client">';
            $dateNowO = $date->getDate();
            $allsum = $sumA = $sumS = $sumN = $sumB = 0;
              $operationQuery = mysqli_query($connection, "SELECT * FROM operation WHERE date  LIKE '".$dateNowO."%'");
              if(mysqli_num_rows($operationQuery) == 0)
                $allsum = 'Нет данных в БД';
              else
              {
                while($dataDB = mysqli_fetch_assoc($operationQuery))
                {
                  $allsum += $dataDB['sum'];
                  if ($dataDB['typeSum'] == 'nal')
                    $sumB += $dataDB['sum'];
                  else
                    $sumN += $dataDB['sum'];
                  if ($dataDB['type'] == 'Амбулатория')
                    $sumA += $dataDB['sum'];
                  else
                    $sumS += $dataDB['sum'];
                }
              }
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
                        {
                          echo '<option value="'.$fioPacient.'">'.$fioPacient.'</option>';
                          $_SESSION['fl']=1;
                        }
                        else
                          while($dataDB = mysqli_fetch_assoc($patientQuery))
                          {
                            $_SESSION['fl']=0;
                            echo '<option value="'.$dataDB['fio'].'">'.$dataDB['fio'].'</option>';
                          }
                        echo '
                      </select></label></p>
                      <p><label for="zal">Внесенная сумма<br><input name="zal" value="'.$sumOper.'" type="text" pattern="\-?[0-9]+$" required></label></p>
                      <p><label for="typezal">Тип платежа<br><select  name="typezal">
                        <option value="nal">Наличный</option>
                        <option value="beznal">Безналичный</option>
                      </select></label></p> 
                      <input type="submit" class="button" name="submit" value="Добавить">
                    </form>
                </div>
                <div class="stat">
                    <h1>Статистика операций за сегодня</h1>';
                    if($allsum == 'Нет данных в БД')
                      echo '<h2>'.$allsum.'</h2>';
                    else
                      echo'
                        <h2>Общая сумма:'.$allsum.' рублей</h2>
                        <p style="float: right;" >Наличный расчет: '.$sumN.'рублей</p>
                        <p style="float: left;" >Безналичный расчет: '.$sumB.'рублей</p><br>
                        <p style="float: left;" >Поступления из амбулатории: '.$sumA.'рублей</p>
                        <p style="float: right;" >Поступления из стационара: '.$sumS.'рублей</p>';
                echo '</div>';
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
                        <input class="input" id="value" name="value" size="32"  type="text" value="" pattern="^[0-9]+$" requires></label>
                      </p>
                      <p class="submit">
                        <input class="button" id="register" name= "register" type="submit" value="Добавить">
                      </p>
                    </form>
                  </div>
                </div>
            ';
            break;
          //Установка даты выписки
          case 8:
            $dateNow = $date -> getDateTime();
            $updateDateOut = mysqli_query($connection, "UPDATE patient SET dateOut = '".$dateNow."' WHERE id = '".$idPacient."'");
            if($updateDateOut)
              $DataBase->routeF();
            break;
          //Удалить дату выписки
          case 9:
            $dateNow = $date -> getDateTime();
            $updateDateOut = mysqli_query($connection, "UPDATE patient SET dateOut = '' WHERE id = '".$idPacient."'");
            if($updateDateOut)
              $DataBase->routeF();
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
<script src="js/script.js"></script>
<?php 
  if(isset($typeStat))
    if($typeStat == 0)
      echo '<script>menuSt.style.display = "none";
        menuAm.style.display = "flex";</script>';
 ?>
<script src="js/jquery.min.js"></script>
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