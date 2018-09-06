<?php
	class Menu{

		function getType($connection){
			echo $connection;
			echo "<script>console.log('[Menu.php] Получение типа пользователя');</script>";
			// $queryType = ($con, "SELECT * FROM usertbl");
			// if(mysqli_num_rows($queryType) != 0)
			// 	echo 1;
			// else
			// 	echo 2;
		}
	 }
	 $menu = new Menu();
?>