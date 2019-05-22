<?php
	/* --- Класс подключения и работы с БД. Константы подключаются отдельно для удобства --- */
	include('constants.php');

	class DataBase{
		/* --- Свойства для создания подключения --- */
		protected $Server, $User, $Pass, $NameBase;	

		/* --- Функция перевода в классовые переменные --- */
		function __construct($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME){
			$this->Server = $DB_SERVER;
	        $this->User = $DB_USER;
	        $this->Pass = $DB_PASS;
	        $this->NameBase = $DB_NAME;
			}

		/* --- Функция создания подключения к БД --- */
		function createConnect(){
			// Создание подключения
			$con = mysqli_connect($this->Server, $this->User, $this->Pass);
			// Вывод сообщения об оштбке при наличии
			if ($con->connect_error) {
				echo "<div class=\"error\"><h1>Внимание! Ошибка установки соединения с сервером MySQL!</h1><h2>Ошибка
				(".$mysqli->connect_errno ."): ".$mysqli->connect_error."</h2></div>";
				}
			// Переход к выбору БД
			$this->selectDataBase($con, $this->NameBase);
		 	return $con;
			}

		/* --- Функция выбора БД --- */
		protected function selectDataBase($connect, $NameBase){
			// Установка кодировки
			$this->setTypeChar($connect);
			// Выбор БД
			$db = mysqli_select_db($connect, $NameBase);
			// При отсутствии создать БД и проверить снова
			if 	(!$db){
				mysqli_query($connect, "CREATE DATABASE ".$NameBase);
				$this->selectDataBase($connect, $NameBase);
				}
			// Проверка целостности таблиц
			$this->checkTable($connect);
			// Проверка наличия таблицы пользователя
			$tableUs = mysqli_query($connect, "SELECT * FROM usertbl");
			if($tableUs){
				// Проверка наличия хотя бы одного пользователя
				$this->checkUsers($connect);
				// Проверка минимального набора параметров
				$this->checkParam($connect);
				}
			}

		/* --- Функция проверки наличия системных таблиц и создания их при необходимости --- */
		protected function checkTable($connect){
		// Проверка наличия таблицы депозита
			$tableDep = mysqli_query($connect, "SELECT * FROM deposit");
			if(!$tableDep)
				mysqli_query($connect,"
					CREATE TABLE `deposit` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `fio` varchar(60) COLLATE utf8_bin NOT NULL,
					  `sum` int(11) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
					");	
			// Проверка наличия таблицы Услуг
			$tableIt = mysqli_query($connect, "SELECT * FROM items");
			if(!$tableIt)
				mysqli_query($connect,"
					CREATE TABLE `items` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `name` varchar(60) COLLATE utf8_bin NOT NULL,
					  `cost` text COLLATE utf8_bin NOT NULL,
					  `dist` text COLLATE utf8_bin NOT NULL,
					  `bonus` text COLLATE utf8_bin NOT NULL,
					  `bonusN` text COLLATE utf8_bin NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
					");
			// Провекра наличия таблицы Пациентов
			$tableCl = mysqli_query($connect, "SELECT * FROM patient");
			if(!$tableCl)
				mysqli_query($connect,"
						CREATE TABLE `patient` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `fio` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `datebirthday` text NOT NULL,
						  `tel` text NOT NULL,
						  `sp_uslug` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `all_sum` int(11) NOT NULL,
						  `doctor` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `sum` int(11) NOT NULL,
						  `type` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `dist` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `dateIn` text NOT NULL,
						  `mest` text NOT NULL,
						  `status` int(11) NOT NULL,
						  `sumNow` int(11) NOT NULL,
						  `dateOut` text NOT NULL,
						  `ad` text NOT NULL,
						  `agent` text NOT NULL,
						  `credits` int(11) NOT NULL,
						  `numCard` int(11) NOT NULL,
						  `dispecher` text NOT NULL,
						  `comment` text NOT NULL,
						  
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
					");
			// Проверка таблицы Пользователей
			$tableUs = mysqli_query($connect, "SELECT * FROM usertbl");
			if(!$tableUs)
				mysqli_query($connect,"
						CREATE TABLE `usertbl` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `fio` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `dol` text NOT NULL,
						  `username` text NOT NULL,
						  `password` text NOT NULL,
						  `value` int(11) NOT NULL,
						  `money_prevMonth` int(11) NOT NULL,
						  `money` int(11) NOT NULL,
						  `uslugi_prevMonth` int(11) NOT NULL,
						  `uslugi` int(11) NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
					");
			// Проверка Параметров
			$tablePar = mysqli_query($connect, "SELECT * FROM param");
			if(!$tablePar)
				mysqli_query($connect,'
						CREATE TABLE `param` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `name` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `value` text NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
						INSERT INTO param VALUES("1","Прием","100");
						INSERT INTO param VALUES("2","Диспетчеры","Иванов,Фролова,Кто-то Там");
						INSERT INTO param VALUES("3","Реклама","ТВ,Агенты,Газета,Наружняя реклама,Вывеска");
						INSERT INTO param VALUES("4","Агенты","Скорая помощь, 21 больница, Справочник");
					');
			// Проверка таблицы Операций
			$tableOper = mysqli_query($connect, "SELECT * FROM operation");
			if(!$tableOper)
				mysqli_query($connect,"
						CREATE TABLE `operation` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `date` text COLLATE utf8_bin NOT NULL,
						  `client` text COLLATE utf8_bin NOT NULL,
						  `sum` float NOT NULL,
						  `type` text COLLATE utf8_bin NOT NULL,
						  `typeSum` text COLLATE utf8_bin NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
					");
			// Проверка таблицы Мест
			$tableM = mysqli_query($connect, "SELECT * FROM mest");
			if(!$tableM)
				mysqli_query($connect,"
						CREATE TABLE `mest` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
						  `value` int(11) NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
					");
			}

		/* --- Функция проверки наличия хотя бы 1го пользователя для авторизации --- */
		protected function checkUsers($connect){
			$tableUs = mysqli_query($connect, "SELECT * FROM usertbl");
			if(mysqli_num_rows($tableUs) == 0){
				mysqli_query($connect,"INSERT INTO `usertbl` (`id`, `fio`, `dol`, `username`, `password`, `value`) VALUES (NULL, 'No Data', 'No Data', 'Administrator', 'Creator01', '0')");
				}
			}

		/* --- Функция проверки параметра Прием --- */
		protected function checkParam($connect){
			$tableUs = mysqli_query($connect, "SELECT * FROM param WHERE name = 'Прием'");
			if(mysqli_num_rows($tableUs) == 0){
				mysqli_query($connect,"INSERT INTO `param` (`name`, `value`) VALUES ( 'Прием', '100')");
				}
			}

		/* --- Функция установки кодировок на запросы и результаты --- */
		protected function setTypeChar($connect){
			mysqli_query($connect, "SET NAMES `UTF8`");
			mysqli_query ($connect,"set character_set_results='utf8'");
			}

		/* --- Функция перехода на последнюю страницу в сессиях --- */
		function route(){
			if (isset($_SESSION['link']))
				echo "<script>setTimeout(function(){self.location=\"".$_SESSION['link']."\";}, 700);</script>";
			else
				header("Location: main.php");
			}

		/* --- Быстрый переход на последнюю ссылку --- */
		function routeF(){
			if (isset($_SESSION['link']))
				echo "<script>setTimeout(function(){self.location=\"".$_SESSION['link']."\";}, 10);</script>";
			else
				header("Location: main.php");
			}
		}

	$DataBase = new DataBase(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$connection = $DataBase -> createConnect();
?>