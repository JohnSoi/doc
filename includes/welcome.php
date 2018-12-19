<?php
	/* --- Класс приветствия --- */
	class Welcome{

		protected $hour, $username;

		/* --- Получение текущего времени --- */
		function __construct($username){
			$this->hour = date("G");
			$this->username = $username;
			$this->printWelMessage($this->hour, $this->username);
			}

		/* --- Функция вывода приветствия --- */
		protected function printWelMessage($hour, $username){
			date_default_timezone_set('Asia/Yekaterinburg');
			if (($hour>=1) and ($hour < 6))
				echo "Доброй ночи, ".$username."!";
			elseif (($hour>=6) and ($hour < 12))
				echo "Доброе утро, ".$username."!";
			elseif (($hour>=12) and ($hour < 18))
				echo "Добрый день, ".$username."!";
			else
				echo "Добрый вечер, ".$username."!";
			}
		}

?>