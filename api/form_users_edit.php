<?php
require 'setting.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$formdata = file_get_contents('php://input');
	parse_str($formdata, $test);

	$name = "'" . $test['name'] . "'";
	$surname = "'" . $test['surname'] . "'";
	$login = "'" . $test['login'] . "'";
	$password = "'" . $test['password'] . "'";
	$patron = "'" . $test['patron'] . "'";
	$post = "'" . $test['post'] . "'";
	$phone = "'" . $test['phone'] . "'";
	$mobile = "'" . $test['mobile'] . "'";
	$email = "'" . $test['email'] . "'";
	$birthdate = $test['birthdate'];
	$is_enable = $test['checkbox'];

	if ($is_enable == 'on') $is_enable = 'true';
	else $is_enable = 'false';

	$query_insert = "INSERT INTO public.users(
	id_creator, id_editor, created_at, updated_at, id_datacenter, login, password, name, surname, patron, post, phone, mobile, email, birthdate, id_session, is_enable)
	VALUES (1, 1, NOW(), NOW(), 1, $login, $password, $name, $surname, $patron, $post, $phone, $mobile, $email, NOW(), '1', $is_enable);";

	$query_edit = "UPDATE public.users
	SET id_editor=?, updated_at=NOW(), login=$login, password=$password, name=$name, surname=$surname, patron=$patron, post=$post, phone=$phone, mobile=$mobile, email=$email, birthdate=$birthdate, is_enable=$is_enable
	WHERE <condition>;";

	$result = pg_query($query_insert) or die(pg_last_error());

	header('Location:../pages/users.php');
	exit;
}
?>