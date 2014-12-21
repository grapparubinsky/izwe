<?php

function inputcheck($var, $condition, $return) {
      if($var == "$condition") return $return;
	else return $a="";
   }

function Diff_Date($date1, $date2) {
  	$date1 = new DateTime($date1);
	$date2 = new DateTime($date2);
	$interval = $date1->diff($date2);
	return $interval->m." mesi, ".$interval->d." giorni"; 

}
