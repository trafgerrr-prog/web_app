<?php
require 'setting.php';
require 'generate_token.php';

date_default_timezone_set('Europe/Moscow');
pg_set_client_encoding($dbconn, "UNICODE");
header('Content-Type: application/json');
//(GET)
/*
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$formdata = json_decode(file_get_contents('php://input'), true);
	//$login="'".$formdata['login']."'";
	//$password="'".$formdata['password']."'";
	//$login="'ll'";
	//$password="'pp'";

	$query_select = "SELECT id, login, password, name, surname
		FROM public.users
		WHERE login = $login AND password = $password;";
	$result = pg_query($query_select);
	$data = pg_fetch_assoc($result);
	echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
*/
//(POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$formdata = json_decode(file_get_contents('php://input'), true);
	$login = "'" . $formdata['login'] . "'";
	$password = "'" . $formdata['password'] . "'";

	$query_select = "SELECT id, login, password, name, surname
		FROM public.users
		WHERE login = $login AND password = $password;";

	$result = pg_query($query_select);
	$data = pg_fetch_assoc($result);

	if (!$data) echo 'no_user';
	else {

	$query_select = "SELECT u.id, u.login, u.password, u.name, u.surname, p.id_perm
		FROM public.users AS u, public.user_permissions AS p
		WHERE u.login = $login AND u.password = $password AND p.id_user = u.id;";
		$result = pg_query($query_select);
		$data = pg_fetch_assoc($result);
		if (!$data) echo 'no_perm';
		else{
//генерация токена
			$access_token = generate_token($data['id']);

			$data["token"] = $access_token;

			echo json_encode($data, JSON_UNESCAPED_UNICODE);

		}
	}

}