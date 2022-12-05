<?php
require 'headers.php';
require 'generate_token.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$headers = getallheaders();
	//получаем ид пользователя и генерим токен
	$get_token = $headers['Authorization'];
	$formdata = json_decode(file_get_contents('php://input'), true);
	$gen_token = generate_token($formdata["id"]);
	//сравниваем с полученым токеном
	if ($get_token == $gen_token)
		echo 'true';
	else echo 'false';
}


?>
