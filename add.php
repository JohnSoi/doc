<?php
	session_start();

	include ('includes/LogIO.php');
	include("includes/DB.php");

	$access->checkNotAuth();

	if (isset($_GET['flagadd']))
      	{
      		$typePage = $_GET['flagadd'];
      		$_SESSION['flagadd'] = $typePage;
      	}
      	else
      	{
      		$typePage = $_SESSION['flagadd'];
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
            $name = $_GET['name'];
            $cost = $_GET['cost'];
            $bonus = $_GET['bonus'];
            $dist = $_GET['dist'];

            $sql = "SELECT * FROM items WHERE name = ".$name."AND cost = ".$cost;
            $query = mysqli_query($connection, $sql);

            if(mysqli_num_rows($query) == 0){
              $sql = "INSERT INTO items(name,cost,dist,bonus) VALUES('".$name."','".$cost."','".$dist."','".$bonus."')";
              $query = mysqli_query($connection, $sql);
              if($query)
                {
                  $message = "Добавление успешно";
                  echo "<script>setTimeout(function(){self.location=\"input.php&flaginput=4\";}, 1500);</script>";
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
      			echo "<h2>Добавление в амбулаторию</h2>";
      			break;
      		case 3:
      			echo "<h2>Добавление в стационар</h2>";
      			break;
      		case 4:
      			echo '
                <div class="container mregister">
                  <div id="loginin">
                    <h1>Регистрация нового пользователя</h1>
                    <form action="add.php" method="GET">
                      <p><label for="name">Название услуги<br><input name="name" type="text"></label></p>
                      <p><label for="cost">Стоимость<br><input name="cost" type="text"></label></p>
                      <p><label for="bonus">Бонус за предоставление<br><input name="bonus" type="text"></label></p>
                      <p><label for="bonus">Описание<br><input name="dist" type="text"></label></p>
                      <input class="button" type="submit" name="submit" value="Добавить">
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>