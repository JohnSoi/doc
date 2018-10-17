<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Вывод</title>
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include("includes/DB.php");
	include("includes/Input.php");
  include 'includes/DBOper.php';
  require_once 'includes/Date.php';
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
      <?php
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
              $input -> getPacientTable($connection, 0);
      			break;
      		//Вывод персональной таблицы
          case 3:
              echo '<section>';
                if(isset($_SESSION['flagop']))
                  unset($_SESSION['flagop']);
                if(isset($_SESSION['sum']))
                  unset($_SESSION['sum']);
                $id = $_GET['id'];
                $_SESSION['link'] = 'input.php?flaginput=3&id='.$id;
                $dateNow = $date->getDate();
                $input -> getPacientPersonalTable($connection, $id, $date);
              echo '</section>';     			
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
          case 7:
          $_SESSION['link'] = 'input.php?flaginput=7';
            $dateNow = $date->getDateTime();
            $DBO -> checkDate($connection, $dateNow);
            $input->getAddPatient($connection);
            break;
          case 8:
          $_SESSION['link'] = 'input.php?flaginput=8';
          $dateNow = $date->getDateTime();
            $DBO -> checkDate($connection, $dateNow);
             $dateNow = $date->getDate();
              $input->getAddOperation($connection, $dateNow);
            break;
          case 9:
          $_SESSION['link'] = 'input.php?flaginput=9';
              $input->getParam();
            break;
          case 10:
          $_SESSION['link'] = 'input.php?flaginput=10';
            $input->getBtn();
            break;
          case 11:
              $input->inPat($connection, $set);
             break;          
          case 12:
          $_SESSION['link'] = 'input.php?flaginput=11';
            $input->inOp($connection, $set);
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
<script src="js/script.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
</body>
</html>