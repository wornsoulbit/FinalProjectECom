<?php

//for each datetime to convert it from UTC to the local time....
//1 - make a datetime with utc timezone with that datetime
//2 - get the local timezone
//3 - set the local timezone
//4 - format and output

function ConvertDateTime(){
	$date = new DateTime(null, new DateTimezone("UTC"));
	$tz = new DateTimeZone(date_default_timezone_get());
	$date->setTimeZone($tz);
	return $date->format('Y-m-d H:i:sP e');
}

function timeoutDateTime(){
	$date = new DateTime(null, new DateTimezone("UTC"));
	$date->add(new DateInterval('PT0H2M0S')); //we add 2min, user is timed out for 2 min
	$tz = new DateTimeZone(date_default_timezone_get());
	$date->setTimeZone($tz);
	return $date->format('Y-m-d H:i:sP e');
}
?>

