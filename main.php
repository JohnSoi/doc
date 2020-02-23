<?php
    /* --- Проверка на авторизованность --- */
    session_start();
    if(!$_SESSION['session_username']) {
        header('Location:login.php');
    }

    require_once 'includes/LogIO.php';

	/* --- Подключение сторонних файлов и получение значений --- */
	$username = $access->getUserName();
	$typeUser = $_SESSION['typeUser'];

	/* --- Роутинг в зависимости от типа --- */
	if ($typeUser === 'view') {
		header('Location: stat.php');
	}
	elseif(($typeUser === 'doc') or ($typeUser === 'ddoc')) {
		header('Location: add.php?flagadd=5&stac=1');
	}
	elseif($typeUser === 'admin') {
		header('Location: add.php?flagadd=6&stac=1');
	}
	elseif ($typeUser === 'psi' || $typeUser === 'stpsi') {
        header('Location: add.php?flagadd=5&stac=0');
	}
	else {
		header('Location:param.php');
	}

