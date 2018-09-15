<?php
	include('constants.php');
	class DataBase
	{	
		/* --- Свойства для создания подключения --- */
		protected $Server, $User, $Pass, $NameBase;	

		/* --- Функция перевода в классовые переменные --- */
		function __construct($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME)
		{
			echo "<script>console.log('[DB.php] Создан объект DB');</script>";
			$this->Server = $DB_SERVER;
	        $this->User = $DB_USER;
	        $this->Pass = $DB_PASS;
	        $this->NameBase = $DB_NAME;

		}

		/* --- Функция создания подключения к БД --- */
		function createConnect()
		{
			ini_set('display_errors','On');
			$con = mysqli_connect($this->Server, $this->User, $this->Pass);
			if ($con->connect_error) {
				echo "<div class=\"error\"><h1>Внимание! Ошибка установки соединения с сервером MySQL!</h1><h2>Ошибка
				(".$mysqli->connect_errno ."): ".$mysqli->connect_error."</h2></div>";
				break;
				}
			$this->selectDataBase($con, $this->NameBase);
		 	return $con;
		}

		/* --- Функция выбора БД --- */
		protected function selectDataBase($connect, $NameBase)
		{
			$db = mysqli_select_db($connect, $NameBase);
			if 	(!$db)
			{
				mysqli_query($connect, "CREATE DATABASE ".$NameBase);
				$this->selectDataBase($connect, $NameBase);
			}
			$this->checkTable($connect);
			$tableUs = mysqli_query($connect, "SELECT * FROM usertbl");
			if($tableUs)
			{
				$this->checkUsers($connect);
			}
			$this->setTypeChar($connect);
		}

		/* --- Функция проверки наличия системных таблиц и создания их при необходимости --- */
		protected function checkTable($connect)
		{	
			$tableIt = mysqli_query($connect, "SELECT * FROM items");
			if(!$tableIt)
				mysqli_query($connect,"CREATE TABLE `items` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(60) NOT NULL , `cost` TEXT NOT NULL , `dist` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_bin");

			$tableCl = mysqli_query($connect, "SELECT * FROM patient");
			if(!$tableCl)
				mysqli_query($connect,"CREATE TABLE `patient` ( `id` INT NOT NULL AUTO_INCREMENT , `fio` VARCHAR(80) NOT NULL , `datebirthday` TEXT NOT NULL , `tel` TEXT NOT NULL , `sp_uslug` TEXT NOT NULL , `all_sum` INT NOT NULL , `doctor` TEXT NOT NULL , `sum` INT NOT NULL , `type` TEXT NOT NULL , `dist` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB");

			$tableUs = mysqli_query($connect, "SELECT * FROM usertbl");
			if(!$tableUs)
			{
				mysqli_query($connect,"CREATE TABLE `usertbl` ( `id` INT NOT NULL AUTO_INCREMENT , `fio` VARCHAR(90) NOT NULL , `dol` TEXT NOT NULL , `username` TEXT NOT NULL , `password` TEXT NOT NULL , `value` INT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB");
				echo "<script>console.log('[DB.php] Добавление пользователя по умолчанию');</script>";
				mysqli_query($connect,"INSERT INTO `usertbl` (`id`, `fio`, `dol`, `username`, `password`, `value`) VALUES (NULL, 'No Data', 'No Data', 'Administrator', 'Creator01', '0')");

			}

			$tablePar = mysqli_query($connect, "SELECT * FROM param");
			if(!$tableUs)
			{
				mysqli_query($connect,"CREATE TABLE `param` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(90) NOT NULL , `value` TEXT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB");
			}
		}

		/* --- Функция проверки наличия хотя бы 1го пользователя для авторизации --- */
		protected function checkUsers($connect)
		{
			$tableUs = mysqli_query($connect, "SELECT * FROM usertbl");
			if(mysqli_num_rows($tableUs) == 0)
			{
				mysqli_query($connect,"INSERT INTO `usertbl` (`id`, `fio`, `dol`, `username`, `password`, `value`) VALUES (NULL, 'No Data', 'No Data', 'Administrator', 'Creator01', '0')");
			}
		}

		/* --- Функция установки кодировок на запросы и результаты --- */
		protected function setTypeChar($connect)
		{
			mysqli_query($connect, "SET NAMES `UTF8`");
			mysqli_query ($connect,"set character_set_results='utf8'");
		}
	}

	$DataBase = new DataBase(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$connection = $DataBase -> createConnect();
?>