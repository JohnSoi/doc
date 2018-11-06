<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/mini.css">
</head>
<body>
	<?php
	include 'includes/DB.php';
	$idPatient = $_GET['id'];

	$patQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$idPatient."'");
	$patArray = mysqli_fetch_assoc($patQuery);
	echo '<h1>Описание для пациента '.$patArray['fio'].'</h1>';
	if (!empty($patArray['dist']))
		$patDist = '<p style=" text-align: center;font-size: 22px;">'.$patArray['dist'].'</p>';
	else
		$patDist = '<h1 style="font-size: 22px;">Нет описания</h1>';

	echo $patDist;
?>	
</body>
</html>
