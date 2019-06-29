<?php
  	require_once '../includes/DB.php';
    $paramQuery = mysqli_query($connection, "SELECT * FROM param WHERE name = 'Диспетчеры'");
    $pararmArray = mysqli_fetch_assoc($paramQuery);
    $dispList = $pararmArray['value'];
    $dispListEx = explode(',', $dispList);
    $countList = count($dispListEx);
    $arrayDisp = array();
    $dispStr = '';

  
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

    for ($i=0; $i < $countList; $i++) { 
      $dispType = $dispListEx[$i];

      $searchPatient = mysqli_query($connection, "SELECT * FROM patient WHERE dispecher = '".$dispType."' AND dateIn LIKE '%/".$month."/".$year."%'");
      $countPatient = mysqli_num_rows($searchPatient);
      $arrayDisp[$dispType]  =  $countPatient;
    }

    for ($i=0; $i < $countList; $i++) { 
      $dispType = $dispListEx[$i];
      $dispStr .= '[\''.$dispType.'\','.$arrayDisp[$dispType].'],';
    }

    echo '<script type="text/javascript" src="../js/loader.js"></script>
        <script type="text/javascript">
              google.charts.load(\'current\', {\'packages\':[\'corechart\']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var data = google.visualization.arrayToDataTable([
                  [\'Диспетчер\', \'Количество пациентов\'],
                  '.$dispStr.'
                ]);

                var options = {
	                title: \'Диспетчеры за '.$month.'.'.$year.'\',
	                is3D: true,
	                legend: \'none\',
	                animation:{
                        duration: 1000,
                        easing: \'out\',
                    }
                };

                var chart = new google.visualization.PieChart(document.getElementById(\'piechart1\'));

                chart.draw(data, options);
              }
            </script>
             <div width="20%" height="100%" id="piechart1"></div> ';
?>