<?php
	class Date{
		function __construct(){
			date_default_timezone_set('Asia/Yekaterinburg');
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