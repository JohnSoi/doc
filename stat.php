<?php
	session_start();
  if(!$_SESSION['session_username'])
    header("Location:login.php");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Статистика</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<?php
	include ('includes/LogIO.php');
	include("includes/DB.php");
?>
<body>
	<div class="wrapper">
		<?php
			include('includes/menu.php');
		?>
  <div class="content">
    <section class="input">
      <?php
      	if (isset($_GET['flagstat']))
      	{
      		$typePage = $_GET['flagstat'];
      		$_SESSION['flagstat'] = $typePage;
      	}
      	else
      	{
      		$typePage = $_SESSION['flagstat'];
      	}

            $query = mysqli_query($connection, "SELECT * FROM patient");
            $queryOpen = mysqli_query($connection, "SELECT * FROM patient WHERE status = '1'");
            $queryClose = mysqli_query($connection, "SELECT * FROM patient WHERE status = '0'");
            $countPacient = mysqli_num_rows($query);
            $countPacientOpen = mysqli_num_rows($queryOpen);
            $countPacientClose = mysqli_num_rows($queryClose);
                $queryA = mysqli_query($connection, "SELECT * FROM operation WHERE type = 'Амбулатория'");
                $queryS = mysqli_query($connection, "SELECT *  FROM operation WHERE type = 'Стационар'");
                $sumA = $sumS = 0;
                while ($row = mysqli_fetch_assoc($queryA)){
                    $sumA += $row['sum'];
                }
                while ($row = mysqli_fetch_assoc($queryS)){
                    $sumS += $row['sum'];
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['Work',     11],
                  ['Eat',      2],
                  ['Commute',  2],
                  ['Watch TV', 2],
                  ['Sleep',    7]
                ]);

                var options = {
                  title: 'My Daily Activities'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        <?php
      	switch ($typePage)
      	{
      		case 1:
      			echo "<h2>Вывод статистики амбулатории</h2>";
      			break;
      		case 2:
      			echo "<h2>Вывод статистики стационара</h2>";
      			break;
      		default:
      			echo "<h2>Перенаправление на странцу авторизации</h2>";
      			echo "<script>setTimeout(function(){self.location=\"login.php\";}, 1500);</script>";
      			break;

      	}
      ?>
    </section>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>