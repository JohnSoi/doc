<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
  
	include("includes/DB.php");
  include("includes/Date.php");
  include('includes/DBOper.php');

  $serv = $_POST['services'];
  var_dump($serv);
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
    <form action="temp.php" method="POST">
      <input type="checkbox" name="services" value="<?php echo 1;  ?>">
        1<br>
      <input type="checkbox" name="services" value="<?php echo 2;  ?>">
        2<br>
      <input type="checkbox" name="services" value="<?php echo 3;  ?>">
        3<br>
      <input type="checkbox" name="services" value="<?php echo 4;  ?>">
        4<br>
      <input type="submit" value="Execute">
    </form>
    </section>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>