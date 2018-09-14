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
	/* ------------------------------------ */
	/* Класс авторизации на сайте, работа с */
	/*         сессиями и их данными        */
	/* ------------------------------------ */
	class LogIO
	{
		/* --- Функция авторизации на сайте --- */
	    public function Authorization($username, $password, $connection)
	    {
	    	$this->del_ses();
	        $query =mysqli_query($connection, "SELECT * FROM usertbl WHERE username='".$username."' 
	        						AND password='".$password."'");
	    		if(mysqli_num_rows($query)!=0)
	    		{
	    			echo "<script>console.log('[LogIO.php] Переход к проверке');</script>";
	    			$this->check($query, $username, $password);
	    		}
	    		else
	    		{
	    			$_SESSION['BADMES'] = "Неверный логин или пароль.";
	    		}
	    }

	    /* --- Функция валидности данных из БД --- */
	    private function check($query, $username, $password)
	    {
	    	while($row=mysqli_fetch_assoc($query))
    		{
    			$dbusername=$row['username'];
    			$dbpassword=$row['password'];
    			$_SESSION['typeUser']=$row['dol'];
   			}
   			$this->route($dbusername,$dbpassword, $username, $password);
	    }

	    /* --- Функция перенаправления при удачной авторизации --- */
	    private function route($dbusername,$dbpassword, $username, $password)
	    {
	    	if($username == $dbusername && $password == $dbpassword)
    			{
					$_SESSION['session_username']=$username;
					$_SESSION['GOODMES'] = "Авторизация успешна";
					echo "<script>setTimeout(function(){self.location=\"hello.php\";}, 500);</script>";
    			}
	    }

	    /* --- Функция удаления сессий-хранилищ --- */
	    public function del_ses()
	    {
	    	if (!empty($_SESSION['GOODMES']))
				unset($_SESSION['GOODMES']);
			if (!empty($_SESSION['BADMES']))
				unset($_SESSION['BADMES']);
	    }

	    /* --- Функция уничтожения данных с очисткой --- */
	    public function dest_ses()
	    {
	    	$this->all_del_ses();
			session_destroy();
			header("Location: login.php");
	    }

	    /* --- Функция удаления всех данных в сессиях и кэше --- */
	    protected function all_del_ses()
	    {
	    	$_SESSION = array();

			// сбросить куки, к которой привязана сессия
			if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			    setcookie(session_name(), '', time() - 42000,
			       	$params["path"], $params["domain"],
			        $params["secure"], $params["httponly"]
    				);
			}
		}

		/* --- Функция проверки на неавторизованность --- */
	    public function checkNotAuth()
	    {
	    	if(!$_SESSION['session_username'])
				echo "<script>setTimeout(function(){self.location=\"login.php\";}, 100);</script>";
		}

		/* --- Функция проверки авторизованности --- */
		public function checkAuth()
	    {
	    	echo "<script>console.log('[LogIO.php] Функция проверки на авторизованность');</script>";
			if(isset($_SESSION["session_username"]))
				echo "<script>setTimeout(function(){self.location=\"main.php\";}, 1500);</script>";		}

		public function getUserName()
	    {
			return $_SESSION["session_username"];
		}



	}

	$access = new LogIO();

?>