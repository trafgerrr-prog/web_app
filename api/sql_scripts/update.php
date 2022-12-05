<?php
header('Content-Type: application/json');
require("setting.php");
if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
if(isset($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}
if(isset($_REQUEST['surname'])) {
	$surname = $_REQUEST['surname'];
}

$query = "UPDATE public.users
	SET name=$name, surname=$surname
	WHERE id = $id
	RETURNING *;";

$result = pg_query($query) or die(pg_last_error());
$data = pg_fetch_assoc($result);
echo "Изменено: " . json_encode($data);
?>