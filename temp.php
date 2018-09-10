<?php
	session_start();
	include ('includes/LogIO.php');
	include("includes/DB.php");

	$access->checkNotAuth();


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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Тестовый сайт</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="main">
    	<?php echo "<p class=\"error\">".$message."</p>" ?>
      <form action="temp.php" method="GET">
      	<p><label for="name">Название услуги<br><input name="name" type="text"></label></p>
      	<p><label for="cost">Стоимость<br><input name="cost" type="text"></label></p>
      	<p><label for="bonus">Бонус за предоставление<br><input name="bonus" type="text"></label></p>
      	<p><label for="bonus">Описание<br><input name="dist" type="text"></label></p>
      	<input type="submit" name="submit" value="Добавить">
      </form>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>