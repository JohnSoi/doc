<?php
	require_once '../includes/DB.php';

	if(isset($_GET['date1'])){
		$date = $_GET['date1'];
		$expDate = explode('.', $date);
		$month1 = $expDate[0];
		$year1 = $expDate[1];
	}
	else{
		$month1 = date("m");
		$year1 = date("Y");
	}
	if(isset($_GET['date2'])){
		$date = $_GET['date2'];
		$expDate = explode('.', $date);
		$month2 = $expDate[0];
		$year2 = $expDate[1];
	}
	else{
		$month2 = date("m") - 1;
		$year2 = date("Y");
		if($month2 <= 0){
  			$month2 = 12 - $month2;
  			$year2 = $year2 - 1;
  		}
  		if(strlen($month2) == 1){
  			$tempDate = $month2;
  			$month2 = '0'.$tempDate;
  		}
	}
	if(isset($_GET['date3'])){
		$date = $_GET['date3'];
		$expDate = explode('.', $date);
		$month3 = $expDate[0];
		$year3 = $expDate[1];
	}
	else{
		$month3 = date("m") - 2;
		$year3 = date("Y");
		if($month3 <= 0){
  			$month3 = 12 - $month3;
  			$year3 = $year3 - 1;
  		}
  		if(strlen($month3) == 1){
  			$tempDate = $month3;
  			$month3 = '0'.$tempDate;
  		}
	}
	// Разница между датами в секундах (Дата формата 2009-01-21)
	function date_di($date1, $date2){
		// timestamp первой даты
		$d1_ts = strtotime($date1);

		// timestamp второй даты
		$d2_ts = strtotime($date2);

		// Количество секунд
		// Функция abs нужна, чтобы не проверять какая из двух дат больше
		$seconds = abs($d1_ts - $d2_ts);

		// Количество дней нужно округлить в меньшую сторону,
		// чтобы узнать точное количество прошедших дней
		// 86400 - количество секунд в 1 дней (60 * 60 * 24)
		$days = floor($seconds / 86400);

		return $days;
	}

	$day1 = $day2 = $day3 = 0;
	$searchD1 = mysqli_query($connection, "SELECT dateIn, dateOut FROM patient WHERE type='Стационар' AND dateIn LIKE '%/".$month1."/".$year1."%'");
	while ($date1 = mysqli_fetch_assoc($searchD1)) {
		if(!empty($date1['dateIn'])){
			// echo $date1['dateIn'].'-';
		    $expD1 = explode(' ', $date1['dateIn']);
		    $expdD1 = explode('/', $expD1[0]);
		    $datest = $expdD1[2].'-'.$expdD1[1].'-'.$expdD1[0];
		}
	    if(!empty($date1['dateOut'])){
	    	// echo $date1['dateOut'].':';
		    $expD2 = explode(' ', $date1['dateOut']);
		    $expdD2 = explode('/', $expD2[0]);
		    $datefin = $expdD2[2].'-'.$expdD2[1].'-'.$expdD2[0];
		}
		if(isset($datest) && isset($datefin))
	    	$day1 += date_di($datest, $datefin);
	}
	$searchD1 = mysqli_query($connection, "SELECT dateIn, dateOut FROM patient WHERE type='Стационар' AND dateIn LIKE '%/".$month2."/".$year2."%'");
	while ($date1 = mysqli_fetch_assoc($searchD1)) {
		if(!empty($date1['dateIn'])){
			// echo $date1['dateIn'].'-';
		    $expD1 = explode(' ', $date1['dateIn']);
		    $expdD1 = explode('/', $expD1[0]);
		    $datest = $expdD1[2].'-'.$expdD1[1].'-'.$expdD1[0];
		}
	    if(!empty($date1['dateOut'])){
	    	// echo $date1['dateOut'].':';
		    $expD2 = explode(' ', $date1['dateOut']);
		    $expdD2 = explode('/', $expD2[0]);
		    $datefin = $expdD2[2].'-'.$expdD2[1].'-'.$expdD2[0];
		}
		if(isset($datest) && isset($datefin))
	    	$day2 += date_di($datest, $datefin);
	}
	$searchD1 = mysqli_query($connection, "SELECT dateIn, dateOut FROM patient WHERE type='Стационар' AND dateIn LIKE '%/".$month3."/".$year3."%'");
	while ($date1 = mysqli_fetch_assoc($searchD1)) {
		if(!empty($date1['dateIn'])){
			// echo $date1['dateIn'].'-';
		    $expD1 = explode(' ', $date1['dateIn']);
		    $expdD1 = explode('/', $expD1[0]);
		    $datest = $expdD1[2].'-'.$expdD1[1].'-'.$expdD1[0];
		}
	    if(!empty($date1['dateOut'])){
	    	// echo $date1['dateOut'].':';
		    $expD2 = explode(' ', $date1['dateOut']);
		    $expdD2 = explode('/', $expD2[0]);
		    $datefin = $expdD2[2].'-'.$expdD2[1].'-'.$expdD2[0];
		}
		if(isset($datest) && isset($datefin))
	    	$day3 += date_di($datest, $datefin);
	}

	echo '
		<style>
			table{
			  border: 1px solid black;
			  width: 100%;
			  border-collapse: collapse;
			  font-family: sans-serif;
			  text-align: center;
			}
			table .main{
				width: 40%;
			}
			table th, table td{
			  border: 1px solid black;
			  padding: 1%;
			}
			table tr:nth-child(2n){
				background: #BBB;
			}
			table tr:nth-child(2n-1){
				background: #EEE;
			}
			table td:nth-child(1){
				font-weight: 900;
			}
		</style>
		<table>
			<thead>
				<th>Количество за '.$month1.'.'.$year1.'</th>
				<th>Количество за '.$month2.'.'.$year2.'</th>
				<th>Количество за '.$month3.'.'.$year3.'</th>
			</thead>
			<tbody>';
			// while ($nameItems = mysqli_fetch_assoc($searchItems)){
			// 	$countIt1 = $countIt2 = $countIt3 = 0;
			// 	$searchD1 = mysqli_query($connection, "SELECT sp_uslug FROM patient WHERE dateIn LIKE '%/".$month1."/".$year1."%'");
			// 	while ($dataSp = mysqli_fetch_assoc($searchD1)) {
			// 	    $expSp = explode(',', $dataSp['sp_uslug']);
			// 	    for ($i = 0; $i < count($expSp); $i++) {
			// 	    	$expItem = explode('-', $expSp[$i]);
			// 	    	if($expItem[0] == $nameItems['id'])
			// 	    		$countIt1++;
			// 	    }
			// 	}
			// 	$searchD2 = mysqli_query($connection, "SELECT sp_uslug FROM patient WHERE dateIn LIKE '%/".$month2."/".$year2."%'");
			// 	while ($dataSp = mysqli_fetch_assoc($searchD2)) {
			// 	    $expSp = explode(',', $dataSp['sp_uslug']);
			// 	    for ($i = 0; $i < count($expSp); $i++) {
			// 	    	$expItem = explode('-', $expSp[$i]);
			// 	    	if($expItem[0] == $nameItems['id'])
			// 	    		$countIt2++;
			// 	    }
			// 	}
			// 	$searchD3 = mysqli_query($connection, "SELECT sp_uslug FROM patient WHERE dateIn LIKE '%/".$month3."/".$year3."%'");
			// 	while ($dataSp = mysqli_fetch_assoc($searchD3)) {
			// 	    $expSp = explode(',', $dataSp['sp_uslug']);
			// 	    for ($i = 0; $i < count($expSp); $i++) {
			// 	    	$expItem = explode('-', $expSp[$i]);
			// 	    	if($expItem[0] == $nameItems['id'])
			// 	    		$countIt3++;
			// 	    }
			// 	}
			 	echo '<tr>';
					echo '<td>'.$day1.'</td>';
					echo '<td>'.$day2.'</td>';
					echo '<td>'.$day3.'</td>';
				echo '</tr>'; 
			// }
			echo '</tbody>
		</table>
	';	

?>
