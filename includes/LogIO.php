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
	    	echo "<script>console.log('[LogIO.php] Функция авторизации');</script>";
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
	    			echo "<script>console.log('[LogIO.php] Ошибка данных');</script>";
	    		}
	    }

	    /* --- Функция валидности данных из БД --- */
	    private function check($query, $username, $password)
	    {
	    	echo "<script>console.log('[LogIO.php] Функция проверки');</script>";
	    	while($row=mysqli_fetch_assoc($query))
    		{
    			$dbusername=$row['username'];
    			$dbpassword=$row['password'];
   			}
   			echo "<script>console.log('[LogIO.php] Перенаправление на роутинг');</script>";
   			$this->route($dbusername,$dbpassword, $username, $password);
	    }

	    /* --- Функция перенаправления при удачной авторизации --- */
	    private function route($dbusername,$dbpassword, $username, $password)
	    {
	    	echo "<script>console.log('[LogIO.php] Функция перехода');</script>";
	    	if($username == $dbusername && $password == $dbpassword)
    			{
    				echo "<script>console.log('[LogIO.php] Присвоение сессии и переход');</script>";
					$_SESSION['session_username']=$username;
					$_SESSION['GOODMES'] = "Авторизация успешна";
					echo "<script>setTimeout(function(){self.location=\"hello.php\";}, 2500);</script>";
    			}
	    }

	    /* --- Функция удаления сессий-хранилищ --- */
	    public function del_ses()
	    {
	    	echo "<script>console.log('[LogIO.php] Удаление сессий-хранилищ');</script>";
	    	if (!empty($_SESSION['GOODMES']))
				unset($_SESSION['GOODMES']);
			if (!empty($_SESSION['BADMES']))
				unset($_SESSION['BADMES']);
	    }

	    /* --- Функция уничтожения данных с очисткой --- */
	    public function dest_ses()
	    {
	    	echo "<script>console.log('[LogIO.php] Уничтожение сессий');</script>";
	    	$this->all_del_ses();
			session_destroy();
			header("Location: login.php");
	    }

	    /* --- Функция удаления всех данных в сессиях и кэше --- */
	    protected function all_del_ses()
	    {
	    	echo "<script>console.log('[LogIO.php] Уничтожение данных всех сессий');</script>";
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
	    	echo "<script>console.log('[LogIO.php] Функция проверки на неавторизованность');</script>";
	    	if(!$_SESSION['session_username'])
				header('Location:login.php');
		}

		/* --- Функция проверки авторизованности --- */
		public function checkAuth()
	    {
	    	echo "<script>console.log('[LogIO.php] Функция проверки на авторизованность');</script>";
			if(isset($_SESSION["session_username"]))
				header("Location: main.php");
		}

		public function getUserName()
	    {
	    	echo "<script>console.log('[LogIO.php] Функция получения имени пользователя');</script>";
			return $username = $_SESSION["session_username"];
		}



	}

	$access = new LogIO();

?>