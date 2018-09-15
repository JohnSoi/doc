<?php
	class Date{
		function __construct(){
			date_default_timezone_set('Asia/Yekaterinburg');
		}
		function getDate(){
			$day = date("d");
			$month = date("m");
			$year =  date("Y");
			$hour = date("G");
			$minute = date("i");
			return $day.'/'.$month.'/'.$year.' '.$hour.':'.$minute;
		}
	}
	$date = new Date;
?>