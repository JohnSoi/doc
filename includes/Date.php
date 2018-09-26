<?php
	class Date{
		function __construct(){
			date_default_timezone_set('Asia/Yekaterinburg');
		}

		public function getPeriod($datein){
			$dateInp = explode('/', $datein);
			$dateOut = explode('/', $this->getDate());

			$yearIn = $dateInp[2];
			$monthIn = $dateInp[1];
			$dayIn = $dateInp[0];
			$yearOut = $dateOut[2];
			$monthOut = $dateOut[1];
			$dayOut = $dateOut[0];

			$date1 = $yearIn.'-'.$monthIn.'-'.$dayIn;
			$date2 = $yearOut.'-'.$monthOut.'-'.$dayOut;

			$diff = strtotime($date2) - strtotime($date1);
			$diff = $diff/60/60/24;
			if ($diff < 0)
				$diff = 'Не правильный диапозон';
			return $diff;
		}

		function getDate(){
			$day = date("d");
			$month = date("m");
			$year =  date("Y");
			return (string)$date = $day.'/'.$month.'/'.$year;
		}

		function getDateTime(){
			$day = date("d");
			$month = date("m");
			$year =  date("Y");
			$hour = date("G");
			$minute = date("i");
			return (string)$date = $day.'/'.$month.'/'.$year.' '.$hour.':'.$minute;
		}

		function normalizeDate($date){
			$dateInp = explode('-', $date);
			$year = $dateInp[0];
			$month = $dateInp[1];
			$day = $dateInp[2];
			$dateOutp = $day.'/'.$month.'/'.$year;
			return $dateOutp;
		}

	}
	$date = new Date;
?>