<?php
	/* --- Запуск сессий и проверка на авторизацию --- */
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
	/* --- Подключение сторонних файлов --- */
	include ('includes/LogIO.php');
	/* --- Удаление сессий и данных --- */
	$access->dest_ses();
?>