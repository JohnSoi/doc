<?php 
	// Подключение сторонних файлов и проверка на неавторизованность
	session_start();
	if(!$_SESSION['session_username'])
	    header('Location:login.php');
	$id = $_GET['id'];

	include 'includes/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Комментарий</title>
	<link rel="stylesheet" href="css/comment.css">
	<meta http-equiv="Cache-Control" content="private">
</head> 
<body>
	<?php 
		$patientQuery = mysqli_query($connection, "SELECT * FROM patient WHERE id = '".$id."'");
		$patArr = mysqli_fetch_assoc($patientQuery);
		$comment = $patArr['comment'];

		if(empty($comment))
			echo '<a target="_blank" href="input.php?flaginput=16&id='.$id.'"><img width="1000%" src="img/comment.png" id="comment" alt="Комментарий отсутствует"></a>';
		else
			echo '<a target="_blank" href="input.php?flaginput=16&id='.$id.'"><img src="img/comment-active.png" data-name="Новое сообщение" id="comment" alt="Новое сообщение" title="Новое сообщение"></a>';

	?>
	
</body>
</html>