<?php
require 'setting.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$formdata = json_decode(file_get_contents('php://input'), true);
	$id = "'" . $formdata['id'] . "'";

	$query_select = "SELECT *
		FROM public.users
		WHERE id = $id;";

	$result = pg_query($query_select);
	$data = pg_fetch_assoc($result);

	echo json_encode($data, JSON_UNESCAPED_UNICODE);

}