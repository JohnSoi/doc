<?php
	/* --- Класс для работы с датами --- */
	class Date{
		/* --- При создании экземпляра класса установить временную зону --- */
		function __construct(){
			date_default_timezone_set('Asia/Yekaterinburg');
			}

		/* --- Функция получения количества дней между датами --- */
		public function getPeriod($datein, $dateout){
			$datein = explode(' ', $datein);
			$dateout = explode(' ', $dateout);
			$dateInp = explode('/', $datein[0]);
			$dateOut = explode('/', $dateout[0]);

			$yearIn = $dateInp[2];
			$monthIn = $dateInp[1];
			$dayIn = $dateInp[0];
			$yearOut = $dateOut[2];
			$monthOut = $dateOut[1];
			$dayOut = $dateOut[0];

			$date1 = $yearIn.'-'.$monthIn.'-'.$dayIn;
			$date2 = $yearOut.'-'.$monthOut.'-'.$dayOut;

			/* --- Вычисление разницы между датами в секундах --- */
			$diff = strtotime($date2) - strtotime($date1);
			/* --- Преобрахование к дням --- */
			$diff = $diff/60/60/24;
			if ($diff < 0)
				$diff = 'Неправильный диапозон';
			return $diff;
			}

		/* --- Получение даты --- */
		function getDate(){
			$day = date("d");
			$month = date("m");
			$year =  date("Y");
			return (string)$date = $day.'/'.$month.'/'.$year;
			}

		/* --- Получение даты и времени --- */
		function getDateTime(){
			$day = date("d");
			$month = date("m");
			$year =  date("Y");
			$hour = date("G");
			$minute = date("i");
			return (string)$date = $day.'/'.$month.'/'.$year.' '.$hour.':'.$minute;
			}

		/* --- Перевод даты в нужный формат --- */
		function normalizeDate($date){
			$dateInp = explode('-', $date);
			$year = $dateInp[0];
			$month = $dateInp[1];
			$day = $dateInp[2];
			$dateOutp = $day.'/'.$month.'/'.$year;
			return $dateOutp;
			}

		/* --- Получение даты файла --- */
		function fileDateTime($date){
			$dateInp = explode(' ', $date);
			$date = $dateInp[0];
			$exdate = explode('/', $date);
			$datefile = $exdate[0].'-'.$exdate[1].'-'.$exdate[2];
			return $datefile;
			}
		}
	$date = new Date;
?>