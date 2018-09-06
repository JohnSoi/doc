<!-- -------------------------------------- -->
<!-- 			Все права защищены  	    -->
<!-- -------------------------------------- -->
<!-- 	Заказчик: Service-Pro Автоматизация	-->
<!-- 			Авторы кода:  				-->
<!-- 	Горбунова Нина и Старков Евгений	-->
<!-- -------------------------------------- -->
<!-- 		Для запуска нужна версия PHP 	-->
<!-- 		не выше 5 версии 				-->
<!-- -------------------------------------- -->

<?php
	/* ------------------------------------- */
	/* Класс работы с товарами или позициями */
	/* ------------------------------------- */
	class Items{
		public function allItems($connect){
			echo "<script>console.log('Функция вывода всех товаров');</script>";
			$queryIt =mysqli_query($connect, "SELECT * FROM items") or die (mysqli_error());
			$this->checkItems($queryIt);
		}

		protected function checkItems($query){
			echo "<script>console.log('Функция проверки наличия данных');</script>";
			$numIt = mysqli_num_rows($query);
			if ($numIt == 0)
				echo "Нет данных в БД";
			else
				$this->inputItems($query);
	
		}

		protected function inputItems($query){
		 echo "<script>console.log('Функция вывода таблицы товаров');</script>";
			echo '<table align="center">' ;
			echo  '<td> Название </td>';
			echo  '<td> Описание </td>';
			echo  '<td> Тип </td>';
			echo  '<td> Количество </td>';
			echo  '<td> Коды </td>';
			echo  '<td> Продажи за месяц </td>';
			echo  '<td> Всего продаж </td>';
			echo  '<td> Редактировать </td>';
			echo  '<td> Удалить</td><tr </td>';
			echo '<tr>';		

			while($row=mysqli_fetch_assoc($query))
    		{
    			echo '<td>'.$row["name"].'</td>';
    			echo '<td>'.$row["dist"].'</td>';
    			echo '<td>'.$row["type"].'</td>';
    			echo '<td>'.$row["count"].'</td>';
    			echo '<td>'.$row["codes"].'</td>';
    			echo '<td>'.$row["saleMont"].'</td>';
    			echo '<td>'.$row["saleAll"].'</td>';
    			echo '<td><a href="edit.php?id='.$row["id"].'&flag=1</td>';
    			echo '<td><a href="delete.php?id='.$row["id"].'&flag=1</td>';
    			echo '<tr>';
   			}
		}
	}

	$item = new Items();
?>	