<?php

$dbloc = '192.168.24.120';
//109.252.182.41
$dbport = '5432';
$dbname = 'COD';
$dbuser = 'administrator';
$dbpassword = '!@#password123';

$dbconn = pg_connect("host=$dbloc port=$dbport dbname=$dbname user=$dbuser password=$dbpassword");
if (!$dbconn) {
	echo "<div><p>База данных недоступна</p><p>" . pg_last_error() . "</p></div>";
	exit();
} 
