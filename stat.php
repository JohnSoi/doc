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

      	
          $patientQuery = mysqli_query($connection, "SELECT * FROM patient");
          $doctorQuery = mysqli_query($connection, "SELECT * FROM usertbl");
          $doctorArray = mysqli_fetch_assoc($doctorQuery);

          $countOpenPat = $countClosePat = $countAPat = $countCPat =  $countAmPat = $countCtPat = 0;

          while($patientData =  mysqli_fetch_assoc($patientQuery))
          {
            if($patientData['status'] == 1)
            {
              $countOpenPat += 1;
              if($patientData['type'] == 'Амбулатория')
                $countAmPat += 1;
              elseif($patientData['type'] == 'Стационар')
                $countCtPat += 1;
            }
            elseif($patientData['status'] == 0)
              $countClosePat += 1;

            if($patientData['type'] == 'Амбулатория')
              $countAPat += 1;
            elseif($patientData['type'] == 'Стационар')
              $countCPat += 1;
          }
          ?>




          <script type="text/javascript" src="js/loader.js"></script>
              <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Тип', 'Значение'],
                    ['Открытые',     <?php echo $countOpenPat; ?>],
                    ['Зактырые',      <?php echo $countClosePat; ?>]
                  ]);

                  var options = {
                    title: 'Открытые/закрытые карточки пациентов',
                    pieHole: 0.4,
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                  chart.draw(data, options);
                }
              </script>
              <div id="donutchart" style="width: 900px; height: 500px;"></div>
              <!-- <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Тип', 'Значение'],
                    ['Амбулатория',     <?php echo $countAPat; ?>],
                    ['Стационар',      <?php echo $countCPat; ?>]
                  ]);

                  var options = {
                    title: 'Текущее отношение стационар/амбулатория',
                    pieHole: 0.4,
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
                  chart.draw(data, options);
                }
              </script>
               <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Тип', 'Значение'],
                    ['Амбулатория',     <?php echo $countAmPat; ?>],
                    ['Стационар',      <?php echo $countCtPat; ?>]
                  ]);

                  var options = {
                    title: 'Отношение стационар/амбулатория',
                    pieHole: 0.4,
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
                  chart.draw(data, options);
                }
              </script> -->
          <?php 
          switch ($typePage)
            {
      		case 1:
            echo '<div id="donutchart" style="width: 900px; height: 500px;"></div>';
            echo '<div id="donutchart1" style="width: 900px; height: 500px;"></div>';
            echo '<div id="donutchart2" style="width: 900px; height: 500px;"></div>';
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