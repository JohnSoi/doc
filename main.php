<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Тестовый сайт</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");

	$access->checkNotAuth();

	$username = $access->getUserName();
?>
<body>
	<div class="wrapper">
  <div class="menu">
    <a href="#" class="menu-btn"><span></span></a>
    <nav class="menu-list">
      <figure><h2 id = "gr1"><a href="#">Амбулатория</a></h2></figure>
			<div class="hid-gr1">
				<a href="">Прием</a>
				<a href="">Отчет</a>
				<a href="">Статистика</a>
			</div>
      <figure><h2 class = "gr2" id = "gr2"><a href="#">Стационар</a></h2></figure>
		<div class="hid-gr2">
			<a href="">Прием</a>
			<a href="">Отчет</a>
			<a href="">Статистика</a>
		</div>
      <figure><h2 id = "gr3"><a href="#">Настройки</a></h2></figure>
		<div class="hid-gr2">
			<a href="">Параметры</a>
			<a href="">Персонал</a>
			<a href="">Услуги</a>
		</div>
      <figure><h2 id = "gr4"><a href="#">Выход</a></h2></figure>
    </nav>
  </div>
  <div class="content">
    <section class="main">
      <h2>Главная</h2>
    </section>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
	$('.menu-btn').on('click', function(e) {
	  e.preventDefault();
	  $('.menu').toggleClass('menu_active');
	  $('.content').toggleClass('content_active');
	})
	$('.menu-btn').on('click', function(e) {
	  e.preventDefault;
	  $(this).toggleClass('menu-btn_active');
	});
</script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>