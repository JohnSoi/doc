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

	$searchItems = mysqli_query($connection, "SELECT id, name FROM items");

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
				<th class="main">Услуга</th>
				<th>Количество за '.$month1.'.'.$year1.'</th>
				<th>Количество за '.$month2.'.'.$year2.'</th>
				<th>Количество за '.$month3.'.'.$year3.'</th>
			</thead>
			<tbody>';
			while ($nameItems = mysqli_fetch_assoc($searchItems)){
				$countIt1 = $countIt2 = $countIt3 = 0;
				$searchD1 = mysqli_query($connection, "SELECT sp_uslug FROM patient WHERE dateIn LIKE '%/".$month1."/".$year1."%'");
				while ($dataSp = mysqli_fetch_assoc($searchD1)) {
				    $expSp = explode(',', $dataSp['sp_uslug']);
				    for ($i = 0; $i < count($expSp); $i++) {
				    	$expItem = explode('-', $expSp[$i]);
				    	if($expItem[0] == $nameItems['id'])
				    		$countIt1++;
				    }
				}
				$searchD2 = mysqli_query($connection, "SELECT sp_uslug FROM patient WHERE dateIn LIKE '%/".$month2."/".$year2."%'");
				while ($dataSp = mysqli_fetch_assoc($searchD2)) {
				    $expSp = explode(',', $dataSp['sp_uslug']);
				    for ($i = 0; $i < count($expSp); $i++) {
				    	$expItem = explode('-', $expSp[$i]);
				    	if($expItem[0] == $nameItems['id'])
				    		$countIt2++;
				    }
				}
				$searchD3 = mysqli_query($connection, "SELECT sp_uslug FROM patient WHERE dateIn LIKE '%/".$month3."/".$year3."%'");
				while ($dataSp = mysqli_fetch_assoc($searchD3)) {
				    $expSp = explode(',', $dataSp['sp_uslug']);
				    for ($i = 0; $i < count($expSp); $i++) {
				    	$expItem = explode('-', $expSp[$i]);
				    	if($expItem[0] == $nameItems['id'])
				    		$countIt3++;
				    }
				}
			 	echo '<tr>';
					echo '<td>'.$nameItems['name'].'</td>';
					echo '<td>'.$countIt1.'</td>';
					echo '<td>'.$countIt2.'</td>';
					echo '<td>'.$countIt3.'</td>';
				echo '</tr>'; 
			}
			echo '</tbody>
		</table>
	';	

?>
