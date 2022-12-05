<?php
header('Content-Type: application/json');
require("setting.php");

$query = "SELECT *
	FROM public.users;";/*
$query_count_row = "SELECT COUNT(*)
	FROM public.users;";*/

$result = pg_query($query) or die(pg_last_error());
for ($i = 1; $i <= pg_num_rows($result); $i++) {
	$data = pg_fetch_assoc($result);
	echo json_encode($data);
}

?>