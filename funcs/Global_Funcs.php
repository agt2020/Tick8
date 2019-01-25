<?php
include_once("PersianCalendar.php");
function IDC()
{
	$ID = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand(0, 0xffff), mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000,
			mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)); 
	return $ID;
}

function Display_Date($date)
{
	$format = "Y-m-d H:i:s";
	$date_value = $date;

	$DateTime = new DateTime($date_value, new DateTimeZone("UTC"));
	$DateTime->setTimezone(new DateTimeZone("Asia/Tehran"));
	$date = $DateTime->format($format);

	$DATE_TIME = explode(' ', $date);
	$DATE = explode('-', $DATE_TIME[0]);
	$DATE = gregorian_to_mds($DATE[0],$DATE[1],$DATE[2]);
	return $DATE[0].'/'.$DATE[1].'/'.$DATE[2].' '.$DATE_TIME[1];
}