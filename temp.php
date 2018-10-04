<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
  
	include("includes/DB.php");
  include("includes/Date.php");
  include('includes/DBOper.php');

  if(isset($_POST['yap']))
    echo count($_POST['yap']);

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
    <form action="temp.php" method="post">
      12
      <input type="checkbox" name="yap[]" value="12"><br>
      8
      <input type="checkbox" name="yap[]" value="8"><br>
      44
      <input type="checkbox" name="yap[]" value="44"><br>
      <input type="submit" value="Execute">
    </form>
    </section>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>