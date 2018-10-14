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
    <style>
      .wrap-10{
        width: 98%;
        height: 100%;
        margin: 0 auto;
        display: block;
        background-image: url('../img/bg1.jpg');
      }
      .gr-top{
        display: inline-flex;
        width: 100%;
        color: white;
        height: 33%;
        justify-content: space-between;
      }
      .gr-mid{
        display: inline-flex;
        width: 100%;
        color: white;
        height: 33%;
        justify-content: space-around;
      }
      .gr-btm{
        display: inline-flex;
        width: 100%;
        color: white;
        height: 34%;
        justify-content: space-between;
      }
      
    </style>
      <div class="wrap-10">

        <div class="gr-top">
          <div class="btn-top-left"><p>Основные параметры</p></div>
        </div>
        
        <div class="gr-mid">
          <div class="btn-mid"><p>Койко-места</p></div>
        </div>

        <div class="gr-btm">
          <div class="btn-btm-left"><p>Пользователи</p></div>
        </div>
        
      </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>