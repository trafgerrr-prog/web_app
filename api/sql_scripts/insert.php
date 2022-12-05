<?php
header('Content-Type: application/json');
require("setting.php");

/*$query = "INSERT INTO public.users(
	id_creator, id_editor, created_at, updated_at, id_datacenter, login, password, name, surname, patron, post, phone, mobile, email, birthdate, id_session, is_enable)
	VALUES (1, 1, NOW(), NOW(), 1, 'admin9', '!@#password123', 'name', 'surname', 'patron', 'post', 'phone', 'mobile', 'email', NOW(), '1', true)
 RETURNING *;";

$result = pg_query($query) or die(pg_last_error());
$data = pg_fetch_assoc($result);
//echo $data;
//print_r($data);
echo json_encode($data);*/

if(isset($_REQUEST['login'])) {
	$login = $_REQUEST['login'];
}
if(isset($_REQUEST['passwd'])) {
	$passwd = $_REQUEST['passwd'];
}
if(isset($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}

$query = "INSERT INTO public.users(
	id_creator, id_editor, created_at, updated_at, id_datacenter, login, password, name, surname, patron, post, phone, mobile, email, birthdate, id_session, is_enable)
	VALUES (1, 1, NOW(), NOW(), 1, $login, $passwd, $name, 'surname', 'patron', 'post', 'phone', 'mobile', 'email', NOW(), '1', true)
 RETURNING *;";

$result = pg_query($query) or die(pg_last_error());
$data = pg_fetch_assoc($result);
echo "Добавлен: " . json_encode($data);
?>