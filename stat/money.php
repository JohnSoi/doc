<?php
	  require_once '../includes/DB.php';
    $year = date("Y");
    $month  = date("m");

    // Если нет конкретного запроса 
  	if(!isset($_GET['date'])){
  		// Если установлен тип запроса то изменить дату
  		if(isset($_GET['type'])){
  			$month  = $month - $_GET['type'];
  		}

  		// Если месяц меньше 0, то вывсети уменьшить год
  		if($month <= 0){
  			$month = 12 - $month;
  			$year = $year - 1;
  		}

  		if(strlen($month) == 1){
  			$tempDate = $month;
  			$month = '0'.$tempDate;
  		}
  	}
  	else{
  		$date = $_GET['date'];
  		$expDate = explode('.', $date);
  		$month = $expDate[0];
  		$year = $expDate[1];
  	}
    // Запрос количество клиентов
    $queryCA = mysqli_query($connection, "SELECT * FROM patient WHERE type = 'Амбулатория' AND dateIn LIKE '%/".$month."/".$year."%'");
    $queryCS = mysqli_query($connection, "SELECT *  FROM patient WHERE type = 'Стационар' AND dateIn LIKE '%/".$month."/".$year."%'");
    // Запрос операций
    $queryA = mysqli_query($connection, "SELECT * FROM operation WHERE type = 'Амбулатория' AND date LIKE '%/".$month."/".$year."%'");
    $queryS = mysqli_query($connection, "SELECT *  FROM operation WHERE type = 'Стационар' AND date LIKE '%/".$month."/".$year."%'");
    $sumA = $sumS = 0;

    // Циклы подсчета сумм
    while ($row = mysqli_fetch_assoc($queryA)){
      $sumA += $row['sum'];
      }
    while ($row = mysqli_fetch_assoc($queryS)){
       $sumS += $row['sum'];
      }

    // Средние чеки
    $srChA = $sumA / mysqli_num_rows($queryCA);
    $srChS = $sumS / mysqli_num_rows($queryCS);



    echo '<script type="text/javascript" src="../js/loader.js"></script>
        <script type="text/javascript">
              google.charts.load(\'current\', {\'packages\':[\'corechart\']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  [\'Тип\', \'Прибыль\'],
                  [\'Амбулаторя\', '.$sumA.'],
                  [\'Стационар\',  '.$sumS.'],
                ]);

                var options = {
	                title: \'Прибыль за '.$month.'.'.$year.'\',
	                is3D: true,
	                legend: \'none\',
	                animation:{
                        duration: 1000,
                        easing: \'out\',
                    }
                };

                var chart = new google.visualization.PieChart(document.getElementById(\'piechart\'));

                chart.draw(data, options);
              }
            </script>
             <div width="100%" height="80%" id="piechart"></div>
             <div width="100%" height="20%">СЧА: '.(Integer)$srChA.' руб. ('.mysqli_num_rows($queryCA).' клиента) <br> СЧС: '.(Integer)$srChS.' руб. ('.mysqli_num_rows($queryCS).' клиента)</div>';
?>