<?php 
	require_once 'Date.php';

	/* --- Класс работы с БД (Очистка, перемещенние данных, резервное копирование) --- */
	class DBO{
		//Объект ВРЕМЯ
		protected $date;
		
		//Передача объекта ВРЕМЯ
		function __construct($date){
			$this->date = $date;
			}

		//Проверка дат последнего изменения и копирования и выполнение операций при необходимости (Переменная подключения к БД, Текущая дата и время)
		public function checkDate($con, $dateTimeNow){
			//Отключения вывода ошибок
			ini_set('display_errors','On');
			//Получение даты последнего перемщения столбцов услуг и зарплаты
			$query = mysqli_query($con, 'SELECT value FROM param WHERE name = "Последнее изменение"');

			$dateFile = $this->date->fileDateTime($dateTimeNow);

			//Разделение текущей даты на дату и время
			$exDate = explode(' ', $dateTimeNow);
			$dateNow = $exDate[0];

			//Проверка наличие полей параметров
			if (mysqli_num_rows($query) == 0){
				$createCH = mysqli_query($con, "INSERT INTO param(name, value) VALUES('Последнее изменение','".$dateNow."')");
				$lastCh = $dateNow;
				}
			else{
				$lastCh = mysqli_fetch_assoc($query);
				$createCH = mysqli_query($con, "UPDATE param SET value = '".$dateNow."' WHERE name = 'Последнее изменение'");
				if(empty($lastCh['value']))
					$lastCh = $dateNow;
				else
					$lastCh = $lastCh['value'];
				}
			

			//Проверка наличия параметров для резервного копирования
			$query = mysqli_query($con, 'SELECT value FROM param WHERE name = "Последняя копия"');
			if (mysqli_num_rows($query) == 0){
				$createBU = mysqli_query($con, "INSERT INTO param(name, value) VALUES('Последняя копия','".$dateTimeNow."')");
				$lastBU = $dateTimeNow;
				}
			else{
				$lastBU = mysqli_fetch_assoc($query);
				if(empty($lastBU['value'])){
					$createBU = mysqli_query($con, "UPDATE param SET value = '".$dateTimeNow."' WHERE name = 'Последняя копия'");
					$lastBU = $dateTimeNow;
					}
				else
					$lastBU = $lastBU['value'];
				}

			//Разделение текущей даты на составляющие
			$exDateNow = explode('/', $dateNow);
			$dayNow = $exDateNow[0];
			$monthNow = $exDateNow[1];
			//$yearNow = $exDateNow[2];
			//Разделение текущего времени на состаляющие
			$timeNow = $exDate[1];
			$exTimeNow = explode(':', $timeNow);
			$hourNow = $exTimeNow[0];
			//$minuteNow = $exTimeNow[1];

			//Разделение даты последнего изменения столбцов
			$exDateCH = explode('/', $lastCh);
			//$dayCH = $exDateCH[0];
			$monthCH = $exDateCH[1];
			//$yearCH = $exDateCH[2];

			//Разделение даты последнего резервного копирования
			$exDateBU = explode(' ', $lastBU);
			$dateBU = $exDateBU[0];
			//Разделение даты последнего резервного копирования составляющие
			$expDateBU = explode('/', $dateBU);
			$dayBU = $expDateBU[0];
			$monthBU = $expDateBU[1];
			//$yearBU = $expDateBU[2];
			//Разделение времени последнего резервного копирования на состаляющие
			$timeBU = $exDateBU[1];
			$exTimeBU = explode(':', $timeBU);
			$hourBU = $exTimeBU[0];
			//$minuteNow = $exTimeNow[1];

			//Проверка количесва файлов бэкапа
			$this -> checkCountFile($dateFile, $dateTimeNow, $con);

			$this -> checkCountDB($con);

			//Проверка месяца последнего изменения
			if ($monthCH != $monthNow)
				$this -> changeDB($con, $dateNow);
			//Проверка последнего бэкапа
			if ($monthBU != $monthNow){
					$this -> backup_database_tables("*",$dateFile, $dateTimeNow, $con);
				}
			else
				if ($dayBU != $dayNow){
						$this -> backup_database_tables("*",$dateFile, $dateTimeNow, $con);
						}
				else{
					$countHour = $hourNow - $hourBU;
					if (abs($countHour) >= 6){
						$this -> backup_database_tables("*",$dateFile, $dateTimeNow, $con);
						}
					}	
			echo "<script>console.log('[DBOper.php] Проверка даты');</script>";
			}

		/* --- Работа с БД и чистка строк --- */
		//Проверка количества строк в БД (Переменная подключения к БД)
		protected function checkCountDB($con){
			// Удаление старых закрытых пациентов при достижении определенного количества строк
			// $query = mysqli_query($con, 'SELECT * FROM patient WHERE  status = "0"');
			// $count = mysqli_num_rows($query);

			// //Количество строк, после которого удаляться первые строки
			// $param = 1000;

			// if ($count > $param){
			// 	$count = $count - $param;
			// 	$this -> delStrDB($con, $count, $query, 1);
			//  }

			$param = 1000;

			$query = mysqli_query($con, 'SELECT * FROM operation');
			$count = mysqli_num_rows($query);
			if ($count > $param){
				$count = $count - $param;
				$this -> delStrDB($con, $count, $query, 2);
				}
			echo "<script>console.log('[DBOper.php] Проверка количества сторок');</script>";
			}

		//Удаление файлов из БД (Переменная подключения к БД, Количество строк для удаления, Запрос на удаление, таблица [1 - пациенты, 2 - операции])
		protected function delStrDB($con, $count, $query, $tables){
			$i = 1;
			if ($tables == 1){
				$id = array();
				while ($data = mysqli_fetch_assoc($query)){
						$id[]=$data['id'];
						$i++;
					}
				for ($q = 0; $q < $count; $q++)
					$del = mysqli_query($con, "DELETE FROM patient WHERE id = '".$id[$q]."'");
				}
			else {
				$id = array();
				while ($data = mysqli_fetch_assoc($query)){
						$id[]=$data['id'];
						$i++;
					}
				for ($q = 0; $q < $count; $q++)
					$del = mysqli_query($con, "DELETE FROM operation WHERE id = '".$id[$q]."'");
				}
			echo "<script>console.log('[DBOper.php] Удаление сторок из БД');</script>";
			}

		//Перенос значений зарплаты и количества услуг в начале нового месяца(Переменная подключения к БД, Текущая дата)
		protected function changeDB($con, $dateNow){
			$query = mysqli_query($con, "SELECT * FROM usertbl");
			while($data = mysqli_fetch_assoc($query)){
				$changePrevMoney = mysqli_query($con, "UPDATE usertbl SET money_prevMonth = '".$data['money']."' WHERE id = '".$data['id']."'");
				$changeMoney = mysqli_query($con, "UPDATE usertbl SET money = '0' WHERE id = '".$data['id']."'");
				$changePrevUslugi = mysqli_query($con, "UPDATE usertbl SET uslugi_prevMonth = '".$data['uslugi']."' WHERE id = '".$data['id']."'");
				$changeUslugi = mysqli_query($con, "UPDATE usertbl SET uslugi = '0' WHERE id = '".$data['id']."'");
				$changeDate = mysqli_query($con, "UPDATE param SET value = '".$dateNow."' WHERE name = 'Последнее изменение'");
				}
			echo "<script>console.log('[DBOper.php] Изменеия полей таблицы Персоналк');</script>";
			}
		/* ------ */

		/* --- Работа с фалами резервных копий --- */
		//Проверка количества фалов резервных копий (Дата файла, Текущая дата и время, Переменная подключения к БД)
		protected function checkCountFile($dateFile, $dateTimeNow, $con){
			$count = $this -> countFile();
			//if ($count == 0)
				//$this -> backup_database_tables(DB_SERVER,DB_USER,DB_PASS,DB_NAME,"*",$dateFile, $dateTimeNow, $con);
			if ($count > 100)
				$this -> delFile('backups/',1728000);
			echo "<script>console.log('[DBOper.php] Проверка количества файлов');</script>";
			}

		//Получение количества файлов
		public function countFile(){
			$dir = opendir('backups');
		  	$count = 0;
		  	while($file = readdir($dir)){
		  	    if($file == '.' || $file == '..' || is_dir('backups' . $file))
		  	        continue;
		  	    $count++;
		  		}
		  	echo "<script>console.log('[DBOper.php] Количества файлов');</script>";
		  	return $count;
			}

		//Удаление резервных копий (Папка для удаления, Время существования фала)
		protected function delFile($dir, $time){
			if($OpenDir=opendir($dir)){ 
			    while(($file=readdir($OpenDir)) !== false){ 
			        if ($file != "." && $file != ".."){ 
			            $dtime=intval(time()-filectime("{$dir}/{$file}")); 
			            if ($dtime>=$time) unlink("{$dir}/{$file}"); 
			        	} 
			    	} 
			    closedir($OpenDir);  
				}
			echo "<script>console.log('[DBOper.php] Удаление резервных копий');</script>";
			}
		
			// Функция резервного копирования базы данных (Хостинг, Логин, Пароль, имя БД, список таблиц [* для всех], Преобразованая дата файла, Текущая дата, Переменная подключения к БД)
		protected function backup_database_tables($tables,$dateFile, $dateNow, $con){
		    //Получаем все таблицы
		    if($tables == '*'){
		        $tables = array();
		        $result = mysqli_query($con, 'SHOW TABLES');
		        mysqli_query($con, "SET NAMES `UTF8`");
				mysqli_query($con, "set character_set_results='utf8'");
		        while($row = mysqli_fetch_row($result))
		            $tables[] = $row[0];
		    	}
		    else
		        $tables = is_array($tables) ? $tables : explode(',',$tables);

		    $return = '#'.$dateFile."\n\n\n";
		    //Цикл по всем таблицам и формирование данных
		    foreach($tables as $table){
		        $result = mysqli_query($con, 'SELECT * FROM '.$table);
		        $num_fields = mysqli_num_fields($result);
		  
		        $return .= 'DROP TABLE '.$table.';';
		        $row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE '.$table));
		        $return .= "\n\n".$row2[1].";\n\n";
		  
		        for ($i = 0; $i < $num_fields; $i++){
		            while($row = mysqli_fetch_row($result)){
		                $return.= 'INSERT INTO '.$table.' VALUES(';
		                for($j=0; $j<$num_fields; $j++){
		                    $row[$j] = addslashes($row[$j]);
		                    //$row[$j] = preg_replace("\n","\\n",$row[$j]);
		                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
		                    if ($j<($num_fields-1)) { $return.= ','; }
		                	}
		                $return.= ");\n";
		            	}
		        	}
		        $return.="\n\n\n";  
		    	}
		  	
		  	//Сохраняем файл
		  	$count = $this ->countFile() + 1;
		  	if (file_exists('backups/db-backup-'.$dateFile.'.sql'))
		  		if (file_exists('backups/db-backup-'.$dateFile.'.1.sql'))
		  			if (file_exists('backups/db-backup-'.$dateFile.'.2.sql'))
		  				$handle = fopen('backups/db-backup-'.$dateFile.'.3.sql','w+');
		  			else 
		  				$handle = fopen('backups/db-backup-'.$dateFile.'.2.sql','w+');
		  		else
		  			$handle = fopen('backups/db-backup-'.$dateFile.'.1.sql','w+');
		  	else
		  		$handle = fopen('backups/db-backup-'.$dateFile.'.sql','w+');
		    		
		    fwrite($handle,$return);
		    fclose($handle);

		    $changeDate = mysqli_query($con, "UPDATE param SET value = '".$dateNow."' WHERE name = 'Последняя копия'");

			echo "<script>console.log('[DBOper.php] Резервное копирование БД');</script>";
			}
		/* ------ */
		}

	$DBO = new DBO($date);
 ?>