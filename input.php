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
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include("includes/DB.php");
	include("includes/Input.php");
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="input">
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

      	switch ($typePage)
      	{
          //Вывод персонала
      		case 1:
      			echo '<section>';
			  				$input -> getPersonalTable($connection, 1);
			  			echo '</section>';	
			  			echo '<section>';
			  				echo "<a class='button' href='add.php?flagadd=1'>Добавить пользователя</a>";
			  			echo '</section>';
      			break;
      		//Вывод пациентов
          case 2:
      			echo '<section>';
              if(isset($_SESSION['sum']))
                unset($_SESSION['sum']);
                $input -> getPacientTable($connection, 0, 1);
              echo '</section>';
      			break;
      		//Вывод персональной таблицы
          case 3:
              echo '<section>';
                if(isset($_SESSION['flagop']))
                  unset($_SESSION['flagop']);
                if(isset($_SESSION['sum']))
                  unset($_SESSION['sum']);
                $id = $_GET['id'];
                $input -> getPacientPersonalTable($connection, $id);
              echo '</section>';     			
              break;
      		//Вывод услуг
          case 4:
    				echo '<section>';
    					$input -> getItemsTable($connection, 1);
    	  			echo '</section>';	
    		  		echo '<section>';
    	  				echo "<a class='button' href='add.php?flagadd=4'>Добавить услугу</a>";
    	 			echo '</section>';      			
    	 			break;
      		//Вывод операций
          case 5:
            echo '<section>';
            $input -> getOperationTable($connection, 1);
            echo '</section>';             
            break;
          //Вывод койко-мест
          case 6:
            $input->getTablesMest($connection);
            break;
          //Если случайный переход
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
</body>
</html>