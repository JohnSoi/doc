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
  <link rel="stylesheet" href="css/menu.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <style>
      .wrap-input{
        margin: 0 auto;
        display: grid;
        width: 95%;
        height: 94%;
        margin: 0 auto;
        margin-top: 3%;
        background: white;
        grid-template-columns: repeat(8, 12.5%);
        grid-template-rows: repeat(8, 12.5%);
        text-align: center;
        justify-content: center;
      }
      .name{
        background: #000;
        grid-column: 1/3;
        color: white;
      }
      .date
      {
        background: red;
        grid-column: 1/3;
        grid-row: 2/3;
      }
      .datest{
        background: yellow;
        grid-column: 4/5;
      }
      .datafin{
        background: #000;
        color: white;
        grid-column: 5/6;
      }
      .oper{
        background: brown;
        grid-column: 6/9;
        grid-row: 1/5;
      }
      .mest{
        background: green;
        grid-column: 1/6;
        grid-row: 3/5;
      }
      .serv{
        background: blue;
        grid-column: 2/7;
        grid-row: 5/7;
      }
      .btn-cl{
        background: #000;
        color: white;
        grid-column: 2/4;
        grid-row: 7/8;
      }
      .btn-cost{
        background: red;
        grid-column: 5/7;
        grid-row: 7/8;
      }
      .doc{
        background: yellow;
        grid-column: 1/9;
        grid-row: 8/9;
      }
    </style>
    <?php require_once 'includes/Date.php'; ?>
      <div class="wrap-input">
       <div class="name">Иванов И.И.</div>
       <div class="date">Дата</div>
       <div class="datest"><?php echo $date->getDateTime(); ?></div>      
       <div class="datefin">Закрыта карта</div>
       <div class="oper"><iframe width="100%" height="100%" src="input.php?flaginput=2" frameborder="1"></iframe></div>
       <div class="mest"> Койко - место</div>
       <div class="serv"> Назначения </div>
       <div class="btn-cl"> Закрыть</div>
       <div class="btn-cost">Оплата</div>
       <div class="doc">Лечащий доктор</div>
      </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>

