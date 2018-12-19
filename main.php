<?php
	/* --- Проверка на авторизованность --- */
	session_start();
	if(!$_SESSION['session_username'])
		header("Location:login.php");
	/* --- Подключение сторонних файлов и получение значений --- */
	require_once 'includes/LogIO.php';
	$username = $access->getUserName();
	$typeuser = $_SESSION['typeUser'];
	
	require_once ('includes/DB.php');
	$querySearch = mysqli_query($connection, "SELECT MAX(id) FROM patient");
	$queryArr = mysqli_fetch_assoc($querySearch);
	var_dump($queryArr);
	$id = $queryArr['MAX(id)'];

	/* --- Роутинг в зависимости от типа --- */
	if ($typeuser == 'view')
		header("Location: stat.php");
	elseif(($typeuser == 'doc') or ($typeuser == 'ddoc'))
		header("Location: add.php?flagadd=5&stac=1");
	elseif($typeuser == 'admin')
		header("Location: add.php?flagadd=6&stac=1");
	elseif ($typeuser == 'psi' || $typeuser == 'stpsi')
		header("Location: input.php?flaginput=3&id=".$id);
	else
		header("Location:param.php");
?>
