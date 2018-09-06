<?php
	class Welcome{

		protected $hour, $username;

		function __construct($hour, $username){
			$this -> $hour = $hour;
			$this -> $username = $username;
			date_default_timezone_set('Asia/Yekaterinburg');
			$this -> printWelMessage($hour, $username);
		}

		protected function printWelMessage($hour, $username){
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