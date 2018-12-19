<?php
  /* --- Проверка на авторизованность --- */
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");

    include("includes/DB.php");

    if (isset($_GET['id'])){
          $id = $_GET['id'];
          $_SESSION['idIn'] = $id;
          }
        else
          if(isset($_SESSION['idIn']))
            $id = $_SESSION['idIn'];
          

    if(isset($_GET['ad'])){
      $ad = $_GET['ad'];
      $updateAd = mysqli_query($connection, "UPDATE patient SET ad = '".$ad."' WHERE  id = '".$id."'");
      }
    if(isset($_GET['agent'])){
      $agent = $_GET['agent'];
      $updateAd = mysqli_query($connection, "UPDATE patient SET agent = '".$agent."' WHERE  id = '".$id."'");
      }
    if(isset($_GET['disp'])){
      $disp = $_GET['disp'];
      $updateAd = mysqli_query($connection, "UPDATE patient SET dispecher = '".$disp."' WHERE  id = '".$id."'");
      }
    if(isset($_GET['agent']) || isset($_GET['ad']) || isset($_GET['disp']))
        if($updateAd){
              $message = "Изменения приняты ";
              echo "<script>setTimeout(function(){window.close();}, 100);</script>";
              }
    if(isset($_GET['submit']))
    {
      $comment = $_GET['comment'];
      $updateComment = mysqli_query($connection, "UPDATE patient SET comment = '".$comment."' WHERE id = '".$id."'");
      if($updateComment)
        echo "<script>setTimeout(function(){window.close();}, 100);</script>";
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Вывод</title>
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/input.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
  /* --- Подключение сторонних файлов --- */
	include("includes/Input.php");
  include 'includes/DBOper.php';
  require_once 'includes/Date.php';
  /* --- Вывод сообщения при наличии --- */
  if (!empty($message)) 
      echo "<p class=\"error\">" . "Сообщение: ". $message . "</p>";  
?>
<body>
	<div class="wrapper">
		<?php
      /* --- Подключение меню --- */
			include('includes/menu.php');
		?>
      <script src="js/script.js"></script>
  <div class="content">
      <?php
        /* --- Получение параметров и установка сессий --- */
      	if (isset($_GET['flaginput']))
        	{
        		$typePage = $_GET['flaginput'];
        		$_SESSION['flaginput'] = $typePage;
        	}
      	else
        	{
        		$typePage = $_SESSION['flaginput'];
        	}

        if (isset($_GET['set']))
          {
            $set = $_GET['set'];
          }

        /* --- Вывод в зависимости от параметров --- */
      	switch ($typePage)
      	{
          //Вывод персонала
      		case 1:
                echo "<a class='button' href='add.php?flagadd=1'>Добавить пользователя</a>";
                $_SESSION['link'] = 'input.php?flaginput=1';
			  				$input -> getPersonalTable($connection);
      			break;
      		//Вывод пациентов
          case 2:
              if(isset($_SESSION['sum']))
                unset($_SESSION['sum']);
              $_SESSION['link'] = 'input.php?flaginput=2';
              $input->getServTable($connection, 0);
      			break;
      		//Вывод персональной таблицы
          case 3:
                if(isset($_SESSION['flagop']))
                  unset($_SESSION['flagop']);
                if(isset($_SESSION['sum']))
                  unset($_SESSION['sum']);
                require_once 'includes/LogIO.php';
                $username = $access->getUserName();
                $typeuser = $_SESSION['typeUser'];
                $id = $_GET['id'];
                $_SESSION['link'] = 'input.php?flaginput=3&id='.$id;
                $dateNow = $date->getDate();
                $input->getPacientPersonalTable($connection, $id, $date, $typeuser);   			
              break;
      		//Вывод услуг
          case 4:
              echo "<a class='button' href='add.php?flagadd=4'>Добавить услугу</a>";        
              $_SESSION['link'] = 'input.php?flaginput=4';
    					$input -> getItemsTable($connection, 1);
    	 			break;
      		//Вывод операций
          case 5:
            echo '<section>';
            $_SESSION['link'] = 'input.php?flaginput=5';
            $input -> getOperationTable($connection, 1);
            echo '</section>';             
            break;
          //Вывод койко-мест
          case 6:
            $_SESSION['link'] = 'input.php?flaginput=6';
            $input->getTablesMest($connection);
            break;
          // Добавление пациента
          case 7:
            $_SESSION['link'] = 'input.php?flaginput=7';
            $dateNow = $date->getDateTime();
            $DBO -> checkDate($connection, $dateNow);
            $input->getAddPatient($connection);
            break;
          // Добавление операций
          case 8:
            $_SESSION['link'] = 'input.php?flaginput=8';
            $dateNow = $date->getDateTime();
            $DBO -> checkDate($connection, $dateNow);
             $dateNow = $date->getDate();
              $input->getAddOperation($connection, $dateNow);
            break;
          // Вывод параметров
          case 9:
            $_SESSION['link'] = 'input.php?flaginput=9';
            $input->getParam();
            break;
          // Вывод кнопок
          case 10:
            $_SESSION['link'] = 'input.php?flaginput=10';
            $input->getBtn();
            break;
          // Вывод пациентов
          case 11:
		  echo '<div id = "con">';
             $_SESSION['link'] = 'input.php?flaginput=11';
             $input->inPat($connection, $set);
			  echo '</div>';
             break;          
          /* --- Вывод операций --- */
          case 12:
            $_SESSION['link'] = 'input.php?flaginput=12';
            $input->inOp($connection, $set);
            break;
          /* --- Выбор рекламы --- */
          case 13:
           $paramQuery = mysqli_query($connection, "SELECT * FROM param WHERE name = 'Реклама'");
           $paramArr = mysqli_fetch_assoc($paramQuery);
           $adsList = $paramArr['value'];
           $adsListEx = explode(',', $adsList);
           $countList = count($adsListEx);
            echo '
              <form action="">
                <p><h1>Укажите источник рекламы</h1>
                  <select name="ad">';
                     for ($i=0; $i < $countList; $i++) { 
                       echo '<option value="'.$adsListEx[$i].'">'.$adsListEx[$i].'</option>';
                     }
                  echo '</select>
                </p>
                <input type="submit" value="Сохранить">
              </form>
            ';
            break;
          /* --- Выбор агентов --- */
          case 14:
          $paramQuery = mysqli_query($connection, "SELECT * FROM param WHERE name = 'Агенты'");
          $paramArr = mysqli_fetch_assoc($paramQuery);
          $agList = $paramArr['value'];
          $agListEx = explode(',', $agList);
          $countList = count($agListEx);
            echo '
              <form action="">
                <p><h1>Укажите агента</h1>
                  <select name="agent">';
                     for ($i=0; $i < $countList; $i++) { 
                       echo '<option value="'.$agListEx[$i].'">'.$agListEx[$i].'</option>';
                     }
                  echo '</select>
                </p>
                <input type="submit" value="Сохранить">
              </form>
            ';
            break;
          /* --- Выбор диспетчера --- */
          case 15:
          $paramQuery = mysqli_query($connection, "SELECT * FROM param WHERE name = 'Диспетчеры'");
          $paramArr = mysqli_fetch_assoc($paramQuery);
          $dispList = $paramArr['value'];
          $dispListEx = explode(',', $dispList);
          $countList = count($dispListEx);
            echo '
              <form action="">
                <p><h1>Укажите диспетчера</h1>
                  <select name="disp">';
                     for ($i=0; $i < $countList; $i++) { 
                       echo '<option value="'.$dispListEx[$i].'">'.$dispListEx[$i].'</option>';
                     }
                  echo '</select>
                </p>
                <input type="submit" value="Сохранить">
              </form>
            ';
            break;
          //Вывод комментария
          case 16:
            $patientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
            $patArr = mysqli_fetch_assoc($patientQuery);
            $comment = $patArr['comment'];
            echo '
              <form action="input.php">
                <label for="comment">Комментарий<br><input name="comment" type="text" value="'.$comment.'"></label>
                <input class="button" type="submit" name="submit" value="Сохранить">
              </form>
            ';
            break;
          //Если случайный переход
          default:
      			echo "<h2>Перенаправление на странцу авторизации</h2>";
      			echo "<script>setTimeout(function(){self.location=\"login.php\";}, 1500);</script>";
      			break;

      	}
      ?>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
</body>
</html>