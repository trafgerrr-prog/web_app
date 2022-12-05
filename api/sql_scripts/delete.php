<?php
header('Content-Type: application/json');
require("setting.php");

if(isset($_REQUEST['delete'])) {
	$id = $_REQUEST['delete'];
}
/*
if(isset($_REQUEST['nodelete'])) {
	$id1 = $_REQUEST['nodelete'];
	echo $id1;
}*/


$query = "DELETE FROM public.users
	WHERE id = $id
	RETURNING *;";

$result = pg_query($query) or die(pg_last_error());
$data = pg_fetch_assoc($result);
//echo $data;
//print_r($data);
echo "Удален:" . json_encode($data);
?>