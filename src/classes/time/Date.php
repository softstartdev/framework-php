<?php

namespace MxSoftstart\FrameworkPhp\classes\time;

class Date {

	private $string = "";
	private $decoded = array();

	function __construct($string) {

		$this->string = $string;

		if($this->isDate()){
			$this->decoded = $this->decode($this->string);
		}
	}
	
	public function isDate() {

		if (\DateTime::createFromFormat("d/m/Y", $this->string) !== false) return true;
		if (\DateTime::createFromFormat("Y/m/d", $this->string) !== false) return true;
		if (\DateTime::createFromFormat("d/m/Y H:i:s", $this->string) !== false) return true;
		if (\DateTime::createFromFormat("Y/m/d H:i:s", $this->string) !== false) return true;
		if (\DateTime::createFromFormat("d-m-Y", $this->string) !== false) return true;
		if (\DateTime::createFromFormat("Y-m-d", $this->string) !== false) return true;
		if (\DateTime::createFromFormat("d-m-Y H:i:s", $this->string) !== false) return true;
		if (\DateTime::createFromFormat("Y-m-d H:i:s", $this->string) !== false) return true;
		
		return false;
	}
	
	//unifica los formatos de fecha
	private function decode($date) {

		$parts = explode(" ", $date);
		
		//conocer si es fecha y hora o solo fecha.

		if(count($parts) == 2){
			$date = $parts[0];
			$time = $parts[1];
		} else {
			$date = $parts[0];
			$time = "00:00:00";
		}
		
		// conocer el formato de origen
		
		if(strpos($date, "/") === false){
			$separator = "-";
			$partsDate = explode("-", $date);
		} else {
			$separator = "/";
			$partsDate = explode("/", $date);
		}

		$partsTime = explode(":", $time);

		// conocer si esta derecho o invertido.

		if (strlen($partsDate[2]) == 4) {
			$day 	 = $partsDate[0];
			$month = $partsDate[1];
			$year  = $partsDate[2];
		} else {
			$day   = $partsDate[2];
			$month = $partsDate[1];
			$year  = $partsDate[0];
		}

		$hour   = $partsTime[0];
		$minute = $partsTime[1];
		$second = $partsTime[2];

		// ------

		$decoded = array(
			"dd/mm/YYYY"=> str_pad($day, 2, "0", STR_PAD_LEFT) . "/" . str_pad($month, 2, "0", STR_PAD_LEFT) . "/" . $year,
			"YYYY/mm/dd"=> $year . "/" . str_pad($month, 2, "0", STR_PAD_LEFT) . "/" . str_pad($day, 2, "0", STR_PAD_LEFT),
			"dd/mm/YYYY hh:mm:ss"=> str_pad($day, 2, "0", STR_PAD_LEFT) . "/" . str_pad($month, 2, "0", STR_PAD_LEFT) . "/" . $year . " " . $hour . ":" . $minute . ":" . $second,
			"YYYY/mm/dd hh:mm:ss"=> $year . "/" . str_pad($month, 2, "0", STR_PAD_LEFT) . "/" . str_pad($day, 2, "0", STR_PAD_LEFT) . " " . $hour . ":" . $minute . ":" . $second,
			
			"dd-mm-YYYY"=> str_pad($day, 2, "0", STR_PAD_LEFT) . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . $year,
			"YYYY-mm-dd"=> $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT),
			"dd-mm-YYYY hh:mm:ss"=> str_pad($day, 2, "0", STR_PAD_LEFT) . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . $year . " " . $hour . ":" . $minute . ":" . $second,
			"YYYY-mm-dd hh:mm:ss"=> $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT) . " " . $hour . ":" . $minute . ":" . $second,
			
			"separator" => $separator,

			"day" => $day,
			"month" => $month,
			"year" => $year,
			"hour" => $hour,
			"minute" => $minute,
			"second" => $second
		);

		//print_r($decoded);

		return $decoded;
	}

	public function getDecoded() {
		return $this->decoded;
	}
	
	public function getFormated($format) {
		return $this->decoded[$format];
	}

	// ------

	public function addDays($quantity) {
		$timestamp = strtotime($this->getFormated("YYYY-mm-dd hh:mm:ss"));
		$newTimestamp = strtotime("+$quantity day", $timestamp);
		return new Date(date("Y/m/d", $newTimestamp));
	}

	public function addWeeks($quantity) {
		$timestamp = strtotime($this->getFormated("YYYY-mm-dd hh:mm:ss"));
		$newTimestamp = strtotime("+$quantity week", $timestamp);
		return new Date(date("Y/m/d", $newTimestamp));

		//$timestamp = strtotime($date);
		//$newTimestamp = strtotime("+$quantity week", $timestamp);
		//return date("d/m/Y", $newTimestamp);
	}

	public function addFortnights($quantity) {

		//date debe ser un día 15 o 28, 29, 30 y 31;
		
		$decodedTmp = $this;

		for($i=0; $i<$quantity; $i++){
			$decodedTmp = $this->calculateNextFortnight($decodedTmp);
		}

		return $decodedTmp;
	}

	// calcula la siguiente quincena;
	private function calculateNextFortnight($myDate) {

		/*
		// decodificar fechas
		$partsDate = explode("-", $date);
		if($isReverse == false){
			$day = $partsDate[0];
			$month = $partsDate[1];
			$year = $partsDate[2];
		}else{
			$year = $partsDate[0];
			$month = $partsDate[1];
			$day = $partsDate[2];
		}
		*/

		// decodificar fecha para poder trabajar.

		$day   = $myDate->getFormated("day");
		$month = $myDate->getFormated("month");
		$year  = $myDate->getFormated("year");

		// calcular el caso del primer periodo, dia 15.

		if ($day == 15) {
			$monthFinal = $month;
			$yearFinal  = $year;
			$dayFinal   = cal_days_in_month(CAL_GREGORIAN, str_pad($monthFinal, 2, "0", STR_PAD_LEFT), $yearFinal);
		}
		
		// calcular el caso del segundo periodo, dia 28, 29, 30, 31 (fin de mes).

		if (in_array($day, array(28, 29, 30, 31))) {
			if($month == 12){
				$monthFinal = 1;
				$yearFinal  = $year + 1;
			}else{
				$yearFinal  = $year;
				$monthFinal = $month+1;
			}
			$dayFinal = 15;
		}

		// dar formato a la respuesta.

		$string = str_pad($dayFinal, 2, "0", STR_PAD_LEFT) . "/" . str_pad($monthFinal, 2, "0", STR_PAD_LEFT) . "/" . $yearFinal;

		// regresar un objeto de tipo fecha pero con la quincena avanzada.
		return new Date($string);

		/*
		if ($isReverse == false) {
			return str_pad($dayFinal, 2, "0", STR_PAD_LEFT) . "-" . str_pad($monthFinal, 2, "0", STR_PAD_LEFT) . "-" . $yearFinal;
		} else {
			return str_pad($yearFinal, 2, "0", STR_PAD_LEFT) . "-" . str_pad($monthFinal, 2, "0", STR_PAD_LEFT) . "-" . $dayFinal;
		}
		*/
	}

	public function addMonths($quantity) {
		
		/*
		// decodificar fechas
		$partsDate = explode("-", $date);
		if($isReverse == false){
			$day = $partsDate[0];
			$month = $partsDate[1];
			$year = $partsDate[2];
		}else{
			$year = $partsDate[0];
			$month = $partsDate[1];
			$day = $partsDate[2];
		}
		*/

		$day   = $this->getFormated("day");
		$month = $this->getFormated("month");
		$year  = $this->getFormated("year");

		// calculamos cuantos meses y años hay que agregar en base a la cantidad solicitada.
		// Por ejemplo 13 meses es agregar 1 año y 1 mes.
		if($quantity > 12){
			$moreYears = floor($quantity/12);
			$moreMonths = $quantity - ($moreYears * 12);
		}else{
			$moreYears = 0;
			$moreMonths = $quantity;
		}

		//verificamos si nos pasariamos al siguiente año al incrementar los meses.

		if($month + $moreMonths > 12){
			$monthFinal = ($month + $moreMonths) - 12;
			$yearFinal = $year + $moreYears + 1;
		}else{
			$monthFinal = $month + $moreMonths;
			$yearFinal = $year + $moreYears;
		}

		// ajustar si el nuevo mes tiene menos dìas.
		// por ejemplo reducir 31 a 28 porque no existe 31 de febrero.

		$lastDay = cal_days_in_month(CAL_GREGORIAN, str_pad($monthFinal, 2, "0", STR_PAD_LEFT), $yearFinal);

		if ($day > $lastDay) {
			$dayFinal = $lastDay;
		} else {
			$dayFinal = $day;
		}

		$string = str_pad($dayFinal, 2, "0", STR_PAD_LEFT) . "/" . str_pad($monthFinal, 2, "0", STR_PAD_LEFT) . "/" . $yearFinal;

		// regresar un objeto de tipo fecha pero con la quincena avanzada.
		return new Date($string);

		//return str_pad($dayFinal, 2, "0", STR_PAD_LEFT) . "-" . str_pad($monthFinal, 2, "0", STR_PAD_LEFT) . "-" . $yearFinal;
	}
	
}
?>