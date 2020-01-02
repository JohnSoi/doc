<?php
  // Подключение сторонних файлов и проверка на неавторизованность
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");
	
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Операции по датам</title>
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/menu.css">
	<meta http-equiv="Cache-Control" content="private">
  <script src="js/jquery.min.js"></script>
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");
  include("includes/Date.php");
?>
<body>
	<div class="wrapper">
			<div class="wrapp">
				<?php 
					if(!isset($_GET['submit']))
						echo '
							<form>
								<label>Введите дату<br><input id="data" type="text" name="date"></label>
								<input type="submit" value="Поиск" name="submit">
							</form>
						';
					else{
						$date = $_GET['date'];
						
						$searchQuery = mysqli_query($connection, "SELECT * FROM operation WHERE date LIKE '%".$date."%'");
						
						if (mysqli_num_rows($searchQuery) == 0)
							echo '<h1>Нет данных в Базе Данных</h1>';
						else
						{
							echo '<table>
								<thead>
								  <tr>
									<th rowspan="2">#</th>
									  <th rowspan="2">Дата операции</th>
									  <th rowspan="2">Клиент</th>
									  <th rowspan="2">Тип лечения</th>
									  <th rowspan="2">Сумма</th>
									  <th rowspan="2">Тип платежа</th>
									</tr>
								</thead>
								<tbody>';
									while($data = mysqli_fetch_assoc($searchQuery)) {
										echo '<tr>';
											echo '<td>'.$data['id'].'</td>';
											echo '<td>'.$data['date'].'</td>';
											echo '<td>'.$data['client'].'</td>';
											echo '<td>'.$data['type'].'</td>';
											if($data['sum'] < 0)
												echo '<td style = "background: rgba(200,10,10,0.3);">'.$data['sum'].'</td>';
											else
												echo '<td style = "background: rgba(10,200,10,0.3);">'.$data['sum'].'</td>';
											switch ($data['typeSum']){
												case 'nal':
													$typeSum = 'Наличный';
													break;
												case 'beznal':
													$typeSum = 'Безналичный';
													break;
												case 'dep':
													$typeSum = 'Депозит';
													break;
											}
											echo '<td>'.$typeSum.'</td>';
										echo '</tr>';
									}
								echo '</tbody>
							</table>';
						}       	
					}
					echo '<a class="button" href="stat.php">Статистика</a>';
					if(isset($_GET['submit']))
						echo '<a class="button" href="temp.php">Новый поиск</a>';
				?>
			</div>
	</div>
<script src="js/script.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript">
        /* --- Маска для телефона --- */
        $(function() {
            $.mask.definitions['~'] = "[+-]";
            $("#tel").mask("8 (999) 999-9999");
			$("#data").mask("99/99/9999");

            $("input").blur(function() {
                $("#info").html("Unmasked value: " + $(this).mask());
            }).dblclick(function() {
                $(this).unmask();
            });
        });
    </script>
</body>
</html>